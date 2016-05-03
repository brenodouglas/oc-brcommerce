<?php namespace Brenodouglasaraujosouza\Drinks\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCustomCategoryHasProductsTable extends Migration
{
    public function up()
    {
        $this->down();
        Schema::create('brenodouglasaraujosouza_drinks_custom_category_has_products', function($table) {
            $table->increments('id');
            $table->integer("product_id");
            $table->integer('custom_category_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_drinks_custom_category_has_products');
    }
}
