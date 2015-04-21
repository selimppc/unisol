<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademic extends Migration {

	public function up()
	{
        Schema::create('acm_class_time', function(Blueprint $table) {
            $table->increments('id');
            $table->time('start_time');
            $table->time('end_time');
            $table->tinyInteger('is_break', false)->length(1);
            $table->integer('created_by', false)->length(11);
            $table->integer('updated_by', false)->length(11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('acm_class_room', function(Blueprint $table) {
            $table->increments('id');
            $table->string('room_number', 16);
            $table->string('building_name', 64);
            $table->string('floor', 16);
            $table->text('address');
            $table->unsignedInteger('department_id')->nullable();

            $table->tinyInteger('status', false)->length(1);
            $table->integer('created_by', false)->length(11);
            $table->integer('updated_by', false)->length(11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_class_room', function($table) {
            $table->foreign('department_id')->references('id')->on('department');
        });


        Schema::create('acm_class_schedule', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_type_id')->nullable();
            $table->unsignedInteger('acm_class_time_id')->nullable();
            $table->date('day');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('acm_class_room_id')->nullable();
            $table->tinyInteger('is_online', false)->length(1);
            $table->tinyInteger('status', false)->length(1);
            $table->integer('created_by', false)->length(11);
            $table->integer('updated_by', false)->length(11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('acm_class_schedule', function($table) {
            $table->foreign('course_type_id')->references('id')->on('course_type');
            $table->foreign('acm_class_time_id')->references('id')->on('acm_class_time');
            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('acm_class_room_id')->references('id')->on('acm_class_room');
        });


        Schema::create('acm_marks_dist_item', function(Blueprint $table)
        {
            $table->increments('id');
            $table->enum('code', array(
                'attd', 'clss', 'clst', 'fint', 'midt'
            ));
            $table->string('title',128);
            $table->tinyInteger('is_associative', false)->length(1);
            $table->tinyInteger('is_exam', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('acm_attendance_config', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('course_type_id')->nullable();
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->string('created_by',32);
            $table->string('updated_by',32);
            $table->timestamps();
        });
        Schema::table('acm_attendance_config', function($table) {
            $table->foreign('course_type_id')->references('id')->on('course_type');
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
        });



        Schema::create('acm_marks_distribution', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_conduct_id')->nullable();
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->string('marks', 128);
            $table->text('note');
            $table->enum('acm_marks_policy', array(
                'attendance', 'best_one', 'avarage', 'avarage_top_n', 'sum', 'single'
            ));
            $table->tinyInteger('is_attendance', false, 1);
            $table->unsignedInteger('acm_attendance_config_id')->nullable();
            $table->tinyInteger('is_default', false, 1)->length(1);
            $table->tinyInteger('is_readonly', false, 1)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_marks_distribution', function($table) {
            $table->foreign('course_conduct_id')->references('id')->on('course_conduct');
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
            $table->foreign('acm_attendance_config_id')->references('id')->on('acm_attendance_config');
        });



        Schema::create('acm_academic', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_conduct_id')->nullable();
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
            $table->foreign('course_conduct_id')->references('id')->on('course_conduct');
            $table->foreign('acm_marks_distribution_id')->references('id')->on('acm_marks_distribution');
            $table->foreign('acm_class_schedule_id')->references('id')->on('acm_class_schedule');
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
            $table->tinyInteger('is_view', false)->length(1);
            $table->tinyInteger('is_download', false)->length(1);
            $table->tinyInteger('is_exam', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_student_activity', function($table) {
            $table->foreign('acm_academic_details_id')->references('id')->on('acm_academic_details');
            $table->foreign('user_id')->references('id')->on('user');
        });


        Schema::create('exm_exam_list', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('year_id')->nullable();
            $table->unsignedInteger('semester_id')->nullable();
            $table->unsignedInteger('course_conduct_id')->nullable();
            $table->string('title', 128);
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->string('status', 32);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_exam_list', function($table) {
            $table->foreign('year_id')->references('id')->on('year');
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
            $table->foreign('course_conduct_id')->references('id')->on('course_conduct');
        });


        Schema::create('exm_question', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_exam_list_id')->nullable();
            $table->unsignedInteger('course_conduct_id')->nullable();
            $table->unsignedInteger('examiner_faculty_user_id')->nullable();
            $table->string('title', 128);
            $table->date('deadline');
            $table->string('total_marks', 128);
            $table->string('status', 32);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question', function($table) {
            $table->foreign('exm_exam_list_id')->references('id')->on('exm_exam_list');
            $table->foreign('course_conduct_id')->references('id')->on('course_conduct');
            $table->foreign('examiner_faculty_user_id')->references('id')->on('user');
        });


        Schema::create('acm_academic_assign_student', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acm_academic_id')->nullable();
            $table->unsignedInteger('student_user_id')->nullable();
            $table->unsignedInteger('assigned_by')->nullable();
            $table->unsignedInteger('exm_question_id')->nullable();

            $table->string('marks', 3);
            $table->string('status', 32);

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_assign_student', function($table) {
            $table->foreign('acm_academic_id')->references('id')->on('acm_academic');
            $table->foreign('student_user_id')->references('id')->on('user');
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
            $table->integer('commented_by', false, 11);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_assign_student_comments', function($table) {
            $table->foreign('acm_assign_std_id')->references('id')->on('acm_academic_assign_student');
        });


        Schema::create('acm_academic_final_marks', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_conduct_id')->nullable();
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('marks', 32);

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acm_academic_final_marks', function($table) {
            $table->foreign('course_conduct_id')->references('id')->on('course_conduct');
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
            $table->foreign('user_id')->references('id')->on('user');
        });


        Schema::create('acm_course_config', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->tinyInteger('marks', false, 3)->unsigned();
            $table->boolean('readonly');
            $table->boolean('default_item');
            $table->boolean('is_attendance');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('acm_course_config', function($table) {
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
            $table->foreign('course_id')->references('id')->on('course');
        });



	}


	public function down()
	{
        Schema::drop('acm_class_time');
        Schema::drop('acm_class_room');
        Schema::drop('acm_class_schedule');
        Schema::drop('acm_marks_dist_item');
        Schema::drop('acm_attendance_config');
        Schema::drop('acm_marks_distribution');
        Schema::drop('acm_academic');
        Schema::drop('acm_academic_details');
        Schema::drop('acm_academic_student_activity');

        Schema::drop('exm_exam_list');
        Schema::drop('exm_question');
        Schema::drop('acm_academic_assign_student');
        Schema::drop('acm_academic_assign_student_submission');
        Schema::drop('acm_academic_assign_student_comments');

        Schema::drop('acm_academic_final_marks');
        Schema::drop('acm_course_config');
	}

}
