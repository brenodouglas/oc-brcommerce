<?php namespace Brenodouglasaraujosouza\Brcommerce\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_orders', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('customer_id');
            $table->integer('address_id');

            $table->timestamps();
        });

        Schema::create('brenodouglasaraujosouza_brcommerce_orders', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('customer_id');
            $table->integer('address_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_orders');
    }
}
