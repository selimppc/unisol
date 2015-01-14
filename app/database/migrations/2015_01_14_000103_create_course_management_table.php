<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseManagementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_management', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('degree_program_id');
            $table->foreign('degree_program_id')->references('id')->on('degree_program')->onDelete('cascade');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('course')->onDelete('cascade');
            $table->unsignedInteger('year_id');
            $table->foreign('year_id')->references('id')->on('year')->onDelete('cascade');
            $table->unsignedInteger('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('faculty')->onDelete('cascade');
            $table->unsignedInteger('semester_id');
            $table->foreign('semester_id')->references('id')->on('semester')->onDelete('cascade');
            $table->unsignedInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('course_type')->onDelete('cascade');
            $table->dateTime('start_date');
            $table->dateTime('end_date');

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
		Schema::drop('course_management');
	}

}
