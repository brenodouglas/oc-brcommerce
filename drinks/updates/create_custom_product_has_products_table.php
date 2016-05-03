<?php namespace Brenodouglasaraujosouza\Drinks\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCustomProductHasProductsTable extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_drinks_custom_product_has_products', function($table) {
            $table->increments('id');
            $table->integer("product_id");
            $table->integer('custom_products_id');
            $table->integer('order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_drinks_custom_product_has_products');
    }
}
