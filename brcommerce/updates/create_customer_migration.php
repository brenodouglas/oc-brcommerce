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
            $table->string('cpf_cnpj');
            $table->string('email');
            $table->string('telephone');
            $table->string('cel');
            $table->string('password');
            $table->boolean('newsletter');
            $table->integer('status');
            $table->integer('email_active');
            $table->integer('type');
            $table->integer('genre');
            $table->date('date_nasc');

            /** User Attributs */
            $table->string('activation_code')->nullable()->index('customer_code_active_index');
            $table->string('persist_code')->nullable();
            $table->string('reset_password_code')->nullable()->index('customer_reset_code_index');
            $table->boolean('is_activated')->default(0);
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_login')->nullable();

            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id', 'group_costumer_f')->references('id')->on('brenodouglasaraujosouza_brcommerce_customer_group');
            $table->index('group_id', 'customer_customer_group_index');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brenodouglasaraujosouza_brcommerce_customer');
    }
}