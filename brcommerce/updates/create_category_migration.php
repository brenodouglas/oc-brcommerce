<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoryMigration extends Migration
{
    public function up()
    {
         Schema::create('brenodouglasaraujosouza_brcommerce_category', function(Blueprint $table)
         {
            $table->increments("id");
            $table->string("name");
            $table->string('slug');

            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');

            $table->text('description');
            $table->boolean("is_publish");
            $table->boolean("is_menu");
            $table->integer('parent_id')->nullable()
                                        ->unsigned();
            $table->integer('columns')->default(1);

            $table->foreign('parent_id')->references('id')->on('brenodouglasaraujosouza_brcommerce_category');
            $table->index('parent_id', 'category_parent_index');

            $table->timestamps();
         });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_category');
    }
}