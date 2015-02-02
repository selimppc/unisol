<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksDistributionRl extends Migration {

	public function up()
	{
        Schema::create('acm_course_config', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->string('marks', 128);
            $table->tinyInteger('readonly',false, 1);
            $table->tinyInteger('default_item',false, 1);
            $table->tinyInteger('is_attendance',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_course_config', function($table) {
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
            $table->foreign('course_id')->references('id')->on('course');
        });


        Schema::create('acm_attendance_config', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_type_id')->nullable();
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_attendance_config', function($table) {
            $table->foreign('course_type_id')->references('id')->on('course_type');
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
        });


        Schema::create('acm_marks_policy', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('acm_marks_distribution', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_management_id')->nullable();
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->string('marks', 128);
            $table->text('note');
            $table->unsignedInteger('acm_marks_policy_id')->nullable();
            $table->tinyInteger('is_attendance', false, 1);
            $table->unsignedInteger('acm_attendance_config_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_marks_distribution', function($table) {
            $table->foreign('course_management_id')->references('id')->on('course_management');
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
            $table->foreign('acm_marks_policy_id')->references('id')->on('acm_marks_policy');
            $table->foreign('acm_attendance_config_id')->references('id')->on('acm_attendance_config');
        });


	}


	public function down()
	{
        Schema::drop('acm_course_config');
        Schema::drop('acm_attendance_config');
        Schema::drop('acm_marks_policy');
        Schema::drop('acm_marks_distribution');
	}

}
