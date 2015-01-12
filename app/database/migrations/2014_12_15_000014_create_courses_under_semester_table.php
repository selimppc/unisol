<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesUnderSemesterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_under_semester', function(Blueprint $table)
		{
			
		$table->increments('id');
		$table->unsignedInteger('degree_program_id');
		$table->foreign('degree_program_id')->references('id')->on('degree_program')->onDelete('cascade');
		
		$table->unsignedInteger('department_id');
		$table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');

		$table->unsignedInteger('year_id');
		$table->foreign('year_id')->references('id')->on('year')->onDelete('cascade');
		
		$table->unsignedInteger('semester_id');
		$table->foreign('semester_id')->references('id')->on('semester')->onDelete('cascade');
		
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
		Schema::drop('courses_under_semester');
	}

}
