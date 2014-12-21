<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('course', function(Blueprint $table) {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->string('course_code');
            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
            $table->text('description');
            $table->string('course_type');
            $table->decimal('evaluation_total_marks', 5, 2);
            $table->decimal('credit', 4, 2);
            $table->decimal('hours_per_credit', 4, 2);
            $table->float('cost_per_credit');
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
        Schema::drop('course');
	}

}
