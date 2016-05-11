<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Utils;

use Session;
use BrenoDouglasAraujoSouza\BrCommerce\Models\Product;

class Filter
{
    const KEY = 'filers-br-commerce-0-1';

    public function add($name, $value)
    {
        if(! Session::has(self::KEY) ) {
            $productSerialize = serialize($product->toArray());
            Session::put(self::PRODUCT_KEY, [$productSerialize]);
        } else {

            $products = $this->get();
            $hasProduct = false;

            foreach ($products as $key => $productItem)
            {
                if($product->id == $productItem->id) {

                    $product->quantity += $productItem->quantity;
                    $products[$key] = serialize($product->toArray());
                    $hasProduct = true;

                } else {
                    $products[$key] = serialize($productItem);
                }
            }

            if (! $hasProduct)
                $products[] = serialize($product->toArray());

            Session::put(self::KEY, $products);
        }

        return \Redirect::to('/carrinho');
    }

    public function getFilters()
    {

    }

    public function remove($name, $value)
    {

    }

    public function removeAll()
    {
        Session::put(self::KEY, []);
    }
}