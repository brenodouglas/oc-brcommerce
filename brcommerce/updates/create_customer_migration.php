<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCustomerMigration extends Migration
{
    public function up()
    {
        Schema::create('brenodouglasaraujosouza_brcommerce_customer', function(Blueprint $table)
        {
            $table->increments("id");
            $table->string("first_name");
            $table->string('last_name');
            $table->string('email');
            $table->string('telephone');
            $table->string('fax');
            $table->string('password');
            $table->string('salt');
            $table->boolean('newsletter');
            $table->integer('status');
            $table->integer('email_active');

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id', 'group_costumer_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_customer_group');
            $table->index('group_id', 'custome_customer_group_index');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_customer');
    }
}