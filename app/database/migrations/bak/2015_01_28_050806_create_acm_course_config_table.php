<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcmCourseConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acm_course_config', function(Blueprint $table)
		{
			$table->increments('id', true);
			$table->unsignedInteger('acm_marks_dist_item_id')->nullable();
			$table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
			$table->unsignedInteger('course_id')->nullable();
			$table->foreign('course_id')->references('id')->on('course_management');
			$table->tinyInteger('marks', false, 3)->unsigned();
			$table->boolean('readonly');
			$table->boolean('default_item');
			$table->boolean('is_attendance');
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
		Schema::drop('acm_course_config');
	}

}
