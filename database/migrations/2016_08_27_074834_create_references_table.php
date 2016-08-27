<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_reference_id');
            $table->string('str_reference_no')
                ->unique();
            $table->integer('int_transaction_id_fk')
                ->unsigned();
            $table->timestamps();

            $table->foreign('int_transaction_id_fk')
                ->references('int_transaction_id')
                ->on('transactions')
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
        Schema::dropIfExists('references');
    }
}
