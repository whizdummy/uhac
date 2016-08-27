<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessDependenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_dependencies', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('int_business_dependency_id');
            $table->string('str_business_dependency_name')
                ->unique();
            $table->string('str_business_dependency_value');
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
        Schema::dropIfExists('business_dependencies');
    }
}
