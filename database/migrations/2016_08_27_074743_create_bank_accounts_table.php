<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_bank_account_id');
            $table->integer('int_account_id_fk')
                ->unsigned();
            $table->string('str_account_no')
                ->unique();
            $table->timestamps();

            $table->foreign('int_account_id_fk')
                ->references('int_account_id')
                ->on('accounts')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}
