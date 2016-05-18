<?php namespace Brenodouglasaraujosouza\Brcommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateBannersTable extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_banners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('target')->nullable();
            $table->string('link')->nullable();;
            $table->string('description');

            $table->dateTime('initial_date');
            $table->dateTime('expiration_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_banners');
    }

}
