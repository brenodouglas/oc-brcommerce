<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProductMigration extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_product', function(Blueprint $table)
        {
            $table->increments("id");
            $table->string("name");
            $table->string('slug');
            $table->string('sku');
            $table->text('description');
            $table->text('review');
            $table->string('author');

            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');

            $table->boolean("is_publish");
            $table->date("publish_date");
            $table->integer('manufacture_id')->unsigned();
            $table->json('options')->nullable();

            $table->string('tags');
            $table->integer('columns')->default(1);

            $table->float('price');
            $table->float('old_price');
            $table->integer('quantity');

            $table->string('inventory_ref');

            $table->foreign('manufacture_id', 'manufacture_product_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_manufacture');
            $table->index('manufacture_id', 'product_manufacture_index');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_product');
    }

}
