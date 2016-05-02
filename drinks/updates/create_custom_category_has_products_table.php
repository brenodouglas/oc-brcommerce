<?php namespace Brenodouglasaraujosouza\Drinks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCustomCategoryHasProductsTable extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_drinks_custom_category_has_products', function($table)
        {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('custom_category_id')->unsigned();

            $table->foreign('product_id', 'cchp')->references('id')
                ->on('brenodouglasaraujosouza_brcommerce_product');
            $table->index('product_id', 'product_custom_category_index');

            $table->foreign('custom_category_id', 'cchpcc')->references('id')
                ->on('brenodouglasaraujosouza_drinks_custom_products');
            $table->index('custom_category_id', 'custom_category_product_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_drinks_custom_category_has_products');
    }

}
