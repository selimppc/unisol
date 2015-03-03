<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcmAcademicRl extends Migration {

	public function up()
	{
        Schema::create('acm_academic', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_management_id')->nullable();
            $table->unsignedInteger('acm_marks_distribution_id')->nullable();
            $table->string('title', 128);
            $table->text('description');
            $table->unsignedInteger('acm_class_schedule_id')->nullable();
            $table->tinyInteger('status', false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic', function($table) {
            $table->foreign('course_management_id')->references('id')->on('course_management');
            $table->foreign('acm_marks_distribution_id')->references('id')->on('acm_marks_distribution');
        });



        Schema::create('acm_academic_details', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acm_academic_id')->nullable();
            $table->string('file', 128);
            $table->text('instruction');
            $table->tinyInteger('status', false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_details', function($table) {
            $table->foreign('acm_academic_id')->references('id')->on('acm_academic');
        });



        Schema::create('acm_academic_student_activity', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acm_academic_details_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->tinyInteger('view', false)->length(1);
            $table->tinyInteger('download', false)->length(1);
            $table->tinyInteger('exam', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_student_activity', function($table) {
            $table->foreign('acm_academic_details_id')->references('id')->on('acm_academic_details');
            $table->foreign('user_id')->references('id')->on('user');
        });



        Schema::create('acm_academic_assign_student', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acm_academic_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('assigned_by')->nullable();
            $table->unsignedInteger('exm_question_id')->nullable();

            $table->string('marks', 3);
            $table->tinyInteger('status', false)->length(1);

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_assign_student', function($table) {
            $table->foreign('acm_academic_id')->references('id')->on('acm_academic');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('assigned_by')->references('id')->on('user');
            $table->foreign('exm_question_id')->references('id')->on('exm_question');
        });


        Schema::create('acm_academic_assign_student_submission', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acm_assign_std_id')->nullable();
            $table->string('file', 128);
            $table->text('comments');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_assign_student_submission', function($table) {
            $table->foreign('acm_assign_std_id')->references('id')->on('acm_academic_assign_student');
        });


        Schema::create('acm_academic_assign_student_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acm_assign_std_id')->nullable();
            $table->text('comments');
            $table->integer('commented_to', false, 11);
            $table->integer('commended_by', false, 11);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_assign_student_comments', function($table) {
            $table->foreign('acm_assign_std_id')->references('id')->on('acm_academic_assign_student');
        });





    }

	public function down()
	{
        Schema::drop('acm_academic');
        Schema::drop('acm_academic_details');
        Schema::drop('acm_academic_student_activity');
        Schema::drop('acm_academic_assign_student');
        Schema::drop('acm_academic_assign_student_submission');
        Schema::drop('acm_academic_assign_student_comments');
	}

}
