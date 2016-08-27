<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_session_id');
            $table->integer('int_account_id_fk')
                ->unsigned();
            $table->datetime('dat_last');
            $table->string('str_phone_model')
                ->nullable();
            $table->string('str_phone_platform')
                ->nullable();
            $table->string('str_version')
                ->nullable();
            $table->string('str_serial')
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
        Schema::dropIfExists('sessions');
    }
}
