<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExmExamListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exm_exam_list', function(Blueprint $table)
		{
			$table->increments('id',true);
            $table->string('title');

            $table->unsignedInteger('year_id');
            $table->foreign('year_id')->references('id')->on('year');


            $table->unsignedInteger('semester_id');
            $table->foreign('semester_id')->references('id')->on('semester');


            $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('id')->on('department');


            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('course');

            $table->string('created_by');

            $table->string('status');

            $table->timestamps();
            $table->engine = 'InnoDB';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exm_exam_list',function( $table){



        });
	}

}
