<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Utils;

use Session;
use Geocoder\Provider\{OpenStreetMap, GoogleMaps};

class Address
{
    const KEY = 'a0s8dkw9';

    public $logradouro;
    public $cidade;
    public $estado;
    public $cep;
    public $pais;
    public $lat;
    public $long;

    public function flush()
    {
        $objectClone = clone($this);
        Session::put(self::KEY, serialize($objectClone));
    }

    public function getObject() : Address
    {
        if (Session::has(self::KEY)) {
            $object = unserialize(Session::get(self::KEY));

            if(! $object)
                return null;

            $this->logradouro = $object->logradouro;
            $this->cidade = $object->cidade;
            $this->pais = $object->pais;
            $this->cep  = $object->cep;
            $this->lat = $object->lat;
            $this->long = $object->long;
        }

        return $this;
    }

    public function calculate()
    {

        $geocoder = new \Geocoder\ProviderAggregator(); // or \Geocoder\TimedGeocoder
        $adapter  = new \Ivory\HttpAdapter\CurlHttpAdapter();

        $geocoder->registerProviders([
            new GoogleMaps($adapter),
            new OpenStreetMap($adapter)
        ]);

        try {
            $geotools = new \League\Geotools\Geotools();
            $result = $geotools->batch($geocoder)->geocode(
                "$this->logradouro $this->cidade, $this->pais"
            )->parallel();

            $this->lat = $result[0]->getLatitude();
            $this->long = $result[0]->getLongitude();

        } catch(\Exception $e) {
            die($e->getMessage());
        }

    }
}