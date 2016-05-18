<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreatOptionMigration extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_option', function($table)
        {
            $table->increments("id");
            $table->string("name");
            $table->integer("type");
            $table->integer('sort_order');
            $table->json('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_option');
    }
}