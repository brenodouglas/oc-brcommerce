<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCustomerGroupMigration extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_customer_group', function($table)
        {
            $table->increments("id");
            $table->string("name");
            $table->text('description');
            $table->boolean("direct_approve");
            $table->integer('type');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_customer_group');
    }
}