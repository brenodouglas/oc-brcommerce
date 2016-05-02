<?php namespace Brenodouglasaraujosouza\Drinks\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSobresTable extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_drinks_sobres', function($table) {
            $table->increments('id');
            $table->text('sobre');
            $table->json('faq')->nullable();
            $table->string('telefone');
            $table->string('email');
            $table->string('endereco');
            $table->text('maps');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_drinks_sobres');
    }
}
