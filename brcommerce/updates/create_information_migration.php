<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateInformationMigration extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_information', function($table)
        {
            $table->increments("id");
            $table->string("name");
            $table->string('slug');

            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');

            $table->text('description');
            $table->boolean("is_publish");
            $table->boolean("in_bottom");

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_information');
    }
}