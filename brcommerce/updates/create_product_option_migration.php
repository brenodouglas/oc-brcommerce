<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProductOptionMigration extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_option_has_product', function(Blueprint $table)
        {
            $table->increments("id");
            $table->string("name");
            $table->integer("type");
            $table->integer('sort_order');
            $table->json('description');
            $table->integer('product_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('option_id')->nullable()->unsigned();

            $table->foreign('product_id', 'product_option_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_product');
            $table->foreign('category_id', 'category_option_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_category');
            $table->foreign('option_id', 'option_option_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_option');

            $table->index('product_id', 'option_product_index');
            $table->index('category_id', 'option_category_index');
            $table->index('option_id', 'option_option_index');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_option_has_product');
    }

}