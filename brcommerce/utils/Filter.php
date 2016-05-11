<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Utils;

use Session;
use BrenoDouglasAraujoSouza\BrCommerce\Models\Product;

class Filter
{
    const KEY = 'filers-br-commerce-0-1';
    private $collection;

    public function __construct()
    {
        $this->collection = new \ArrayIterator();
        $this->collection->unserialize(Session::get(self::KEY));
    }

    private function isValueIdentical($item, $value) {
        return (! is_array($item['value']) &&  $item['value'] == $value)
                || (is_array($item) && $item['value'][0] == $value[0] && $item['value'][1] == $item[1]);
    }

    public function add($name, $value)
    {
        foreach($this->collection as $item) {
            if($item['name'] == $name && $this->isValueIdentical($item, $value))
                return false;
        }

        $this->collection->append(['name' => $name, 'value' => $value]);

        Session::put(self::KEY, $this->collection->serialize());
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