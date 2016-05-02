<?php namespace Brenodouglasaraujosouza\Drinks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCustomProductsHasProductsTable extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_drinks_custom_products_has_products', function($table)
        {;
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('custom_products_id')->unsigned();

            $table->foreign('product_id')->references('id')
                  ->on('brenodouglasaraujosouza_brcommerce_product');
            $table->index('product_id', 'product_custom_product_index');

            $table->foreign('custom_products_id')->references('id')
                  ->on('brenodouglasaraujosouza_drinks_custom_categories');
            $table->index('custom_products_id', 'custom_product_product_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_drinks_custom_products_has_products');
    }

}
