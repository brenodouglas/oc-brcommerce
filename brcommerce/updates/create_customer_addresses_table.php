<?php namespace Brenodouglasaraujosouza\Brcommerce\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCustomerAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_customer_addresses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('number');
            $table->string('reference');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('complement');
            $table->integer('customer_id')->unsigned();

            $table->foreign('customer_id', 'address_costumer_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_customer');
            $table->index('customer_id', 'address_customer_index');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_customer_addresses');
    }
}
