<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_account_id');
            $table->string('str_name')
                ->unique();
            $table->date('date_birthday');
            $table->integer('int_gender');
            $table->integer('int_civil_status');
            $table->string('str_username')
                ->unique();
            $table->string('str_password');
            $table->string('str_email')
                ->unique();
            $table->string('str_contact')
                ->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
