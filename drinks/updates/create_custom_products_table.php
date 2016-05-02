<?php namespace Brenodouglasaraujosouza\Drinks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCustomProductsTable extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_drinks_custom_products', function($table)
        {
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_drinks_custom_products');
    }

}
