<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_app_setting_id');
            $table->integer('int_account_id_fk')
                ->unsigned();
            $table->string('txt_setting_dir')
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
        Schema::dropIfExists('app_settings');
    }
}
