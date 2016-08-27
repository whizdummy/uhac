<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_goal_id');
            $table->integer('int_account_id_fk')
                ->unsigned();
            $table->integer('int_category_id_fk')
                ->unsigned();
            $table->string('str_goal_name');
            $table->text('txt_remarks');
            $table->decimal('deci_value');
            $table->date('date_due');
            $table->date('date_achieved')
                ->nullable();
            $table->timestamps();

            $table->foreign('int_account_id_fk')
                ->references('int_account_id')
                ->on('accounts')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('int_category_id_fk')
                ->references('int_category_id')
                ->on('categories')
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
        Schema::dropIfExists('goals');
    }
}
