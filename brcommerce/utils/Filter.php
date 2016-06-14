<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Utils;

use Session;
use BrenoDouglasAraujoSouza\BrCommerce\Models\Product;

class Filter
{
    const KEY = 'filers-br-commerce-0-1';
    const KEY_ORDER = 'filters-br-commerce-order-0-10';

    private $order;
    private $collection;

    public function __construct()
    {
        $this->collection = new \ArrayIterator();
        $this->order = Session::get(self::KEY_ORDER);
        
        if(! $this->order) 
            $this->addOrder('created_at');

        $this->collection->unserialize(Session::get(self::KEY));
    }

    private function isValueIdentical($item, $value)
    {
        return (! is_array($item['value']) &&  $item['value'] == $value)
                || (is_array($item) && $item['value'][0] == $value[0] && $item['value'][1] == $item[1]);
    }

    public function inFilter (string $name, string $value) : bool
    {
        foreach($this->getFilters() as $filterItem) {
            if($filterItem['name'] == $name && $filterItem['value'] == $value)
                return true;
        }

        return false;
    }

    public function add(string $name, string $value)
    {
        foreach($this->collection as $item) {
            if($item['name'] == $name && $this->isValueIdentical($item, $value))
                return false;
        }

        $this->collection->append(['name' => $name, 'value' => $value]);

        Session::put(self::KEY, $this->collection->serialize());
    }

    public function addOrder($value) 
    {
        $this->order = $value;
        Session::put(self::KEY_ORDER, $value);
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getOrderType()
    {
        $order = $this->getOrder();
        switch ($order) {
            case 'min_price':
                return 'ASC';
            case 'max_price':
                return 'DESC';
            default:
                return 'DESC';
        }
    }

    public function getOrderColumn()
    {
        $order = $this->getOrder();
        switch ($order) {
            case 'min_price':
                return 'brenodouglasaraujosouza_brcommerce_product.price';
            case 'max_price':
                return 'brenodouglasaraujosouza_brcommerce_product.price';
            default:
                return 'brenodouglasaraujosouza_brcommerce_product.created_at';
        }    
    }

    public function getFilters()
    {
        return $this->collection;
    }

    public function remove($name, $value)
    {
        foreach($this->collection as $key => $item) {
            if($item['name'] == $name && $this->isValueIdentical($item, $value))
                $this->collection->offsetUnset($key);
        }

        Session::put(self::KEY, $this->collection->serialize());
    }

    public function removeAll()
    {
        $this->collection = new \ArrayIterator();
        Session::put(self::KEY, []);
    }
}