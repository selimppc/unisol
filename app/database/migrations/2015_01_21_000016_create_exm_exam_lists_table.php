<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExmExamListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exm_exam_lists', function(Blueprint $table)
		{
            $table->increments('id');

            $table->unsignedInteger('course_management_id');
            $table->foreign('course_management_id')->references('id')->on('course_management');

            $table->unsignedInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('course_type');

            $table->string('status');
            $table->string('created_by');
            $table->string('updated_by');
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
		Schema::drop('exm_exam_lists');
	}

}
