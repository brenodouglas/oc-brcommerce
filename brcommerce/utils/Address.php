<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Utils;

use Session;

class Address
{
    const KEY = 'a0s8dkw9';

    public $logradouro;
    public $cidade;
    public $estado;
    public $cep;
    public $pais;

    public function flush()
    {
        $objectClone = clone($this);
        Session::put(self::KEY, serialize($objectClone));
    }

    public function getObject() : Address
    {
        if (Session::has(self::KEY)) {
            $object = unserialize(Session::get(self::KEY));
            $this->logradouro = $object->logradouro;
            $this->cidade = $object->cidade;
            $this->pais = $object->pais;
            $this->cep  = $object->cep;
        }

        return $this;
    }

    public function calculate()
    {

    }
}