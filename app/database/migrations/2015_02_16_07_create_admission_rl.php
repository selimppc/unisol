<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmission extends Migration {

	public function up()
	{
        Schema::create('degree', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('year_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->string('title', 128);
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('total_credit', 16);
            $table->string('duration', 16);

            $table->tinyInteger('status', false)->lenght(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('degree', function($table) {
            $table->foreign('course_management_id')->references('id')->on('course_management');
            $table->foreign('acm_marks_distribution_id')->references('id')->on('acm_marks_distribution');
        });
	}

	public function down()
	{
        Schema::drop('degree');
	}

}
