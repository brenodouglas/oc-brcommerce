<?php namespace Brenodouglasaraujosouza\Drinks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCustomCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_drinks_custom_categories', function($table)
        {
            $table->increments("id");
            $table->string("name");
            $table->string('slug');

            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');

            /**
             * 0 - Sub
             * 1 - List
             */
            $table->integer('type');

            $table->text('description');
            $table->boolean("is_menu");
            $table->integer('parent_id')->nullable()
                                        ->unsigned();

            $table->foreign('parent_id', 'parent_custom_category_id')->references('id')
                                                                    ->on('brenodouglasaraujosouza_drinks_custom_categories');
            $table->index('parent_id', 'parent_custom_category_index');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_drinks_custom_categories');
    }

}
