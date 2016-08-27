<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_transaction_id');
            $table->integer('int_bank_account_id_fk')
                ->unsigned()
                ->nullable();
            $table->integer('int_bill_id_fk')
                ->unsigned()
                ->nullable();
            $table->integer('int_transaction_type')
                ->unique()
                ->nullable();
            $table->integer('int_transfer_account_id_fk')
                ->unsigned()
                ->nullable();
            $table->string('str_confirmation_no')
                ->nullable();
            $table->string('str_source_currency')
                ->nullable();
            $table->string('str_transfer_currency')
                ->nullable();
            $table->timestamps();

            $table->foreign('int_bank_account_id_fk')
                ->references('int_bank_account_id')
                ->on('bank_accounts')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('int_bill_id_fk')
                ->references('int_bill_id')
                ->on('billers')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('int_transfer_account_id_fk')
                ->references('int_bank_account_id')
                ->on('bank_accounts')
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
        Schema::dropIfExists('transactions');
    }
}
