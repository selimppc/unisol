<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeProgramTable extends Migration {


	public function up()
	{
        Schema::create('degree_program', function($table) {
            $table->increments('id', true);
            $table->string('title', 128);

            $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('id')->on('department');

            $table->unsignedInteger('degree_level_id');
            $table->foreign('degree_level_id')->references('id')->on('degree_level');

            $table->string('description');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
	}


	public function down()
	{
        Schema::table('degree_program', function($table) {
            $table->drop();
        });
	}

}
