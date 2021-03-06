<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Utils;

use BrenoDouglasAraujoSouza\BrCommerce\Models\Customer;
use Session;
use Cookie;
use October\Rain\Auth\AuthException;

class AuthManager
{

    protected $user;

    protected static $instance;

    protected $sessionKey = 'site_auth';

    protected $requireActivation = false;

    public function createUserModel()
    {
        return new Customer();
    }

    /**
     * Finds a user by the login value.
     * @param string $login
     */
    public function findUserByLogin($login)
    {
        $model = $this->createUserModel();
        $query = $model->newQuery();
        $user = $query->where('email', $login)->first();
        return $user ?: null;
    }

    /**
     * Finds a user by the given credentials.
     */
    public function findUserByCredentials(array $credentials)
    {
        $model = $this->createUserModel();
        if (!array_key_exists('email', $credentials)) {
            throw new AuthException('O campo "email" é obrigatório.');
        }

        $query = $model->newQuery();
        $hashableAttributes = $model->getHashableAttributes();
        $hashedCredentials = [];

        /*
         * Build query from given credentials
         */
        foreach ($credentials as $credential => $value) {
            // All excepted the hashed attributes
            if (in_array($credential, $hashableAttributes)) {
                $hashedCredentials = array_merge($hashedCredentials, [$credential => $value]);
            }
            else {
                $query = $query->where($credential, '=', $value);
            }
        }

        if (!$user = $query->first()) {
            throw new AuthException('Usuário não encontrado com essas credenciais');
        }

        /*
         * Check the hashed credentials match
         */
        foreach ($hashedCredentials as $credential => $value) {

            if (!$user->checkHashValue($credential, $value)) {
                // Incorrect password
                if ($credential == 'password') {
                    throw new AuthException('Usuário/Senha incorretos');
                }

                // User not found
                throw new AuthException('Não foi encontrado nenhum usuário com essas credenciais.');
            }
        }

        return $user;
    }

    /**
     * Attempts to authenticate the given user according to the passed credentials.
     *
     * @param array $credentials The user login details
     * @param bool $remember Store a non-expire cookie for the user
     */
    public function authenticate(array $credentials, $remember = true)
    {
        /*
         * Default to the login name field or fallback to a hard-coded 'login' value
         */
        $loginName = 'email';
        $loginCredentialKey = (isset($credentials[$loginName])) ? $loginName : 'login';

        if (empty($credentials[$loginCredentialKey])) {
            throw new AuthException(sprintf('O "%s" atributo é obrigátorio.', $loginCredentialKey));
        }

        if (empty($credentials['password'])) {
            throw new AuthException('A senha é um campo obrigatório.');
        }

        /*
         * If the fallback 'login' was provided and did not match the necessary
         * login name, swap it over
         */
        if ($loginCredentialKey !== $loginName) {
            $credentials[$loginName] = $credentials[$loginCredentialKey];
            unset($credentials[$loginCredentialKey]);
        }



        /*
         * Look up the user by authentication credentials.
         */
        try {
            $user = $this->findUserByCredentials($credentials);
        }
        catch (AuthException $ex) {
            throw $ex;
        }

        $user->clearResetPassword();
        $this->login($user, $remember);

        return $this->user;
    }

    /**
     * Check to see if the user is logged in and activated, and hasn't been banned or suspended.
     *
     * @return bool
     */
    public function check()
    {
        if (is_null($this->user)) {

            /*
             * Check session first, follow by cookie
             */
            if (
                !($userArray = Session::get($this->sessionKey)) &&
                !($userArray = Cookie::get($this->sessionKey))
            ) {
                return false;
            }

            /*
             * Check supplied session/cookie is an array (username, persist code)
             */
            if (!is_array($userArray) || count($userArray) !== 2) {
                return false;
            }

            list($id, $persistCode) = $userArray;

            /*
             * Look up user
             */
            if (!$user = $this->createUserModel()->find($id)) {
                return false;
            }

            /*
             * Confirm the persistence code is valid, otherwise reject
             */
            if (!$user->checkPersistCode($persistCode)) {
                return false;
            }

            /*
             * Pass
             */
            $this->user = $user;
        }

        /*
         * Check cached user is activated
         */
        if (!($user = $this->getUser()) || ($this->requireActivation && !$user->is_activated)) {
            return false;
        }

        return true;
    }

    /**
     * Returns the current user, if any.
     */
    public function getUser()
    {
        if (is_null($this->user)) {
            $this->check();
        }

        return $this->user;
    }

    /**
     * Logs in the given user and sets properties
     * in the session.
     */
    public function login($user, $remember = true)
    {
        if ($this->requireActivation && !$user->is_activated) {
            $login = $user->getLogin();
            throw new AuthException(sprintf(
                'Cannot login user "%s" as they are not activated.', $login
            ));
        }

        $this->user = $user;

        /*
         * Create session/cookie data to persist the session
         */
        $toPersist = [$user->getKey(), $user->getPersistCode()];
        Session::put($this->sessionKey, $toPersist);

        if ($remember) {
            Cookie::queue(Cookie::forever($this->sessionKey, $toPersist));
        }

        /*
         * Fire the 'afterLogin' event
         */
        $user->afterLogin();
    }

    /**
     * Logs the current user out.
     */
    public function logout()
    {
        $this->user = null;

        Session::forget($this->sessionKey);
        Cookie::queue(Cookie::forget($this->sessionKey));
    }
}