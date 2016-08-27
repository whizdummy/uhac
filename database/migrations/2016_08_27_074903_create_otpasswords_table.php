<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtpasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otpasswords', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_otpassword_id');
            $table->integer('int_session_id_fk')
                ->unsigned();
            $table->integer('int_otp')
                ->unique();
            $table->timestamps();

            $table->foreign('int_session_id_fk')
                ->references('int_session_id')
                ->on('sessions')
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
        Schema::dropIfExists('otpasswords');
    }
}
