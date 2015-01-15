<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcmMarksDistributionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acm_marks_distribution', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('course_management_id')->index();
            $table->foreign('course_management_id')->references('id')->on('course_management');
            $table->unsignedInteger('acm_marks_dist_item_id')->index();
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
            $table->unsignedInteger('acm_marks_policy_id')->index();
            $table->foreign('acm_marks_policy_id')->references('id')->on('acm_marks_policy');
            $table->unsignedInteger('acm_attendance_config_id')->index();
            $table->foreign('acm_attendance_config_id')->references('id')->on('acm_attendance_config');
            $table->boolean('is_attendance');
            $table->tinyInteger('marks', false, 3)->unsigned();
            $table->string('note');
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
		Schema::drop('acm_marks_distribution');
	}

}
