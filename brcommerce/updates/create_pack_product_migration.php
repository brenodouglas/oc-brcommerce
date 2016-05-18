<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePackProductMigration extends Migration
{

    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_pack', function($table)
        {
            $table->increments("id");
            $table->string("name");
            $table->string('slug');
            $table->string('sku');
            $table->text('description');

            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');

            $table->boolean("is_publish");
            $table->date("publish_date");

            $table->string('tags');

            $table->float('total_price');
            $table->float('individuals_price');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_pack');
    }

}
