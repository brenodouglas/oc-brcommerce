<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateManufactureMigration extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_manufacture', function(Blueprint $table)
        {
            $table->increments("id");
            $table->string("name");
            $table->string('slug');
            $table->text('description');
            $table->boolean('is_enable');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_manufacture');
    }
}