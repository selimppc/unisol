<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcmAttendanceConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acm_attendance_config', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('course_type')->onDelete('cascade');
            $table->unsignedInteger('acm_marks_dist_item_id')->index();
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
            $table->string('created_by',32);
            $table->string('updated_by',32);
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
		Schema::drop('acm_attendance_config');
	}

}
