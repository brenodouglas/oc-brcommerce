<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProductCategoryMigration extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_product_has_category', function(Blueprint $table)
        {
            $table->increments("id");
            $table->integer('product_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable()->unsigned();

            $table->foreign('product_id', 'product_cateogry_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_product');
            $table->foreign('category_id', 'category_product_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_category');

            $table->index('product_id', 'product_category_product_index');
            $table->index('category_id', 'product_category_category_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_product_has_category');
    }

}