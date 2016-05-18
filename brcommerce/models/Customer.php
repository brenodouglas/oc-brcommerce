<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Models;

use Model;
use October\Rain\Auth\Models\User;

/**
 * Model
 */
class Customer extends User
{
    use \October\Rain\Database\Traits\Hashable;
    use \October\Rain\Database\Traits\Purgeable;
    use \October\Rain\Database\Traits\Validation;

    /**
     * Validation rules
     */
    public $rules = [
        'email' => 'required|between:6,255|email|unique:backend_users',
        'password' => 'required:create|between:4,255|confirmed',
        'password_confirmation' => 'required_with:password|between:4,255'
    ];

    public $dates = ['date_nasc'];

    protected $purgeable = ['password_confirmation'];

    /**
     * @var array The attributes that should be hidden for arrays.
     */
    protected $hidden = ['password', 'reset_password_code', 'activation_code', 'persist_code'];

    /**
     * @var array List of attribute names which should be hashed using the Bcrypt hashing algorithm.
     */
    protected $hashable = ['password', 'persist_code'];

    /**
     * @var array The attributes that aren't mass assignable.
     */
    protected $guarded = ['reset_password_code', 'activation_code', 'persist_code'];


    /**
     * @var string The login attribute.
     */
    public static $loginAttribute = 'email';

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = true;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_brcommerce_customer';

    public $belongsTo = [
      'group' => [CustomerGroup::class]
    ];

    public $belongsToMany = [];

    public function afterCreate()
    {
        $this->restorePurgedValues();

        if ($this->send_invite) {
            $this->sendInvitation();
        }
    }

}