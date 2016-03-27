<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateReviewMigration extends Migration
{
    public function up()
    {
         Schema::create('brenodouglasaraujosouza_brcommerce_review', function($table)
         {
             $table->increments('id');
             $table->string('title');
             $table->text('description');
             
             $table->string('author');
             $table->boolean('in_description')->default(false);
             $table->integer('product_id')->nullable();
             
             $table->timestamps();
         });
    }

    public function down()
    {
        Schema::drop('brenodouglasaraujosouza_brcommerce_review');
    }
}