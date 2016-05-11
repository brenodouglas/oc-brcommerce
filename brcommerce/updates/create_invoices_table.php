<?php namespace Brenodouglasaraujosouza\Brcommerce\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_invoices', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_invoices');
    }
}
