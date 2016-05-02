<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Utils;

use Session;
use BrenoDouglasAraujoSouza\BrCommerce\Models\Product;

class Cart 
{
	const PRODUCT_KEY = 'products';

	public function add(Product $product, $quantity = 1)
	{
		$product->quantity = $quantity;

		if(! Session::has(self::PRODUCT_KEY) ) {
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

			Session::put(self::PRODUCT_KEY, $products);
		}
		
		return \Redirect::to('/carrinho');
	}

	public function get()
	{
		$products = Session::get(self::PRODUCT_KEY, []);
		$prodMaped = array_map(function($product) {
			$productObject = (object) unserialize($product);
			$productResult = Product::find($productObject->id);
			$productResult->quantity = $productObject->quantity;
			return $productResult;
		}, $products);
		
		return $prodMaped;
	}

	public function removeById($id)
	{
		$products = Session::get(self::PRODUCT_KEY, []);
		$keyRemove = false;

		foreach($products as $key => $product) {
			
			$product = unserialize($product);

			if($product->id == $id) {
				$keyRemove = $key;
				break;
			}
		}

		if ($keyRemove !== false)
			unset($products[$keyRemove]);

		Session::put(self::PRODUCT_KEY, $products);
	}

	public function removeAll() 
	{
		Session::put(self::PRODUCT_KEY, []);
	}

	public function incrementQuantity($id)
	{
		$products = Session::get(self::PRODUCT_KEY, []);

		foreach($products as $key => $product) {
			$product = unserialize($product);

			if($product->id == $id){
				$product->quantity += 1;
				$products[$key] = serialize($product);
			}
		}

		Session::put(self::PRODUCT_KEY, $products);
	}

	public function decrementQuantity($id)
	{
		$products = Session::get(self::PRODUCT_KEY, []);

		foreach($products as $key => $product) {
			$product = unserialize($product);

			if($product->id == $id && $product->quantity > 1){
				$product->quantity -= 1;
				$products[$key] = serialize($product);
			}
		}

		Session::put(self::PRODUCT_KEY, $products);
	}

}