<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePackCategoryMigration extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_pack_has_category', function($table)
        {
            $table->increments("id");
            $table->integer('pack_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable()->unsigned();

            $table->foreign('pack_id', 'pack_category_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_pack');
            $table->foreign('category_id', 'category_pack_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_category');

            $table->index('pack_id', 'pack_category_pack_index');
            $table->index('category_id', 'pack_category_category_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_pack_has_category');
    }

}