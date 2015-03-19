<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmission extends Migration {

    //TODO :: In Common Migration
        //TODO : Year, Semester, Subject, Department, Country, Course Type, Degree Group
        //TODO : Degree Program, Exam Center, Billing Item, Waiver, Course
        //TODO : adm test subject
	public function up()
	{
        Schema::create('degree', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('degree_program_id')->nullable();
            $table->unsignedInteger('degree_group_id')->nullable();
            $table->string('title', 128);
            $table->text('description');
            $table->string('total_credit', 128);
            $table->string('duration', 128);
            $table->enum('policy_retake',array(
                'less-grade', 'no-less', 'best-one', 'latest-one'
            ));
            $table->enum('policy_course_taking',array(
                'strict', 'relaxed'
            ));
            $table->string('credit_min_per_semester', 128);
            $table->string('credit_max_per_semester', 128);
            $table->tinyInteger('status', false)->lenght(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('degree', function($table) {
            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('degree_program_id')->references('id')->on('degree_program');
            $table->foreign('degree_group_id')->references('id')->on('degree_group');
        });


        Schema::create('batch', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('degree_id')->nullable();
            $table->unsignedInteger('year_id')->nullable();
            $table->unsignedInteger('semester_id')->nullable();
            $table->string('batch_number', 128);
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('seat_total', 16);
            $table->dateTime('admission_deadline');
            $table->dateTime('admtest_date');
            $table->time('admtest_start_time');
            $table->tinyInteger('status', false)->lenght(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('batch', function($table) {
            $table->foreign('degree_id')->references('id')->on('degree');
            $table->foreign('year_id')->references('id')->on('year');
            $table->foreign('semester_id')->references('id')->on('semester');
        });

        Schema::create('degree_course', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('degree_id')->nullable();
            $table->unique(['course_id', 'degree_id']);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('degree_course', function($table) {
            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('degree_id')->references('id')->on('degree');
        });

        Schema::create('batch_course', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_id')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('semester_id')->nullable();
            $table->unsignedInteger('year_id')->nullable();
            $table->tinyInteger('is_mandatory', false)->lenght(1);
            $table->enum('major_minor',array(
                'major', 'minor'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('batch_course', function($table) {
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('year_id')->references('id')->on('year');
        });

        //Todo :: Course Enrollment
        Schema::create('course_enrollment', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_course_id')->nullable();
            $table->unsignedInteger('student_user_id')->nullable();
            $table->string('status', 128);
            $table->unsignedInteger('taken_in_year_id')->nullable();
            $table->unsignedInteger('taken_in_semester_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('course_enrollment', function($table) {
            $table->foreign('batch_course_id')->references('id')->on('batch_course');
            $table->foreign('student_user_id')->references('id')->on('user');
            $table->foreign('taken_in_year_id')->references('id')->on('year');
            $table->foreign('taken_in_semester_id')->references('id')->on('semester');
        });


        //TODO : Course Conduct
        Schema::create('course_conduct', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('faculty_user_id')->nullable();
            $table->unsignedInteger('year_id')->nullable();
            $table->unsignedInteger('semester_id')->nullable();
            $table->unsignedInteger('degree_id')->nullable();
            $table->enum('degree_course_oriented',array(
                'degree-oriented', 'course-oriented'
            ));
            $table->enum('status',array(
                'requested', 'deny', 'accepted', 'cancel'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('course_conduct', function($table) {
            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('faculty_user_id')->references('id')->on('user');
            $table->foreign('year_id')->references('id')->on('year');
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('degree_id')->references('id')->on('degree');
        });

        //Todo : Course Conduct Comments
        Schema::create('course_conduct_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_conduct_id')->nullable();
            $table->text('comments');
            $table->string('commented_to', 128);
            $table->string('commented_by', 128);
            $table->string('status', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('course_conduct_comments', function($table) {
            $table->foreign('course_conduct_id')->references('id')->on('course_conduct');
        });

        Schema::create('adm_examiner', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('type', 128);
            $table->integer('assigned_by', false, 11);
            $table->dateTime('deadline');
            $table->text('note');
            $table->string('status', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_examiner', function($table) {
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->foreign('user_id')->references('id')->on('user');
        });


        Schema::create('adm_examiner_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_id')->nullable();
            $table->text('comment');
            $table->integer('commented_to', false, 11);
            $table->integer('commented_by', false, 11);
            $table->tinyInteger('status', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_examiner_comments', function($table) {
            $table->foreign('batch_id')->references('id')->on('batch');
        });


        Schema::create('batch_admtest_subject', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_id')->nullable();
            $table->unsignedInteger('admtest_subject_id')->nullable();
            $table->text('description');
            $table->string('marks', 128);
            $table->string('qualify_marks', 128);
            $table->string('duration', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('batch_admtest_subject', function($table) {
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->foreign('admtest_subject_id')->references('id')->on('admtest_subject');
        });

        //TODO: Batch Applicant
        Schema::create('batch_applicant', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_id')->nullable();
            $table->unsignedInteger('applicant_id')->nullable();
            $table->tinyInteger('status', false)->length(11);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('batch_applicant', function($table) {
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->foreign('applicant_id')->references('id')->on('applicant');
        });



        // TODO : Batch Waiver
        Schema::create('batch_waiver', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_id')->nullable();
            $table->unsignedInteger('waiver_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('batch_waiver', function($table) {
            $table->foreign('batch_id')->references('id')->on('batch');
            $table->foreign('waiver_id')->references('id')->on('waiver');
        });

        Schema::create('batch_education_constraint', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_id')->nullable();
            $table->enum('level_of_education',array(
                'psc', 'jsc', 'ssc', 'hsc', 'grad', 'under_grad', 'bachelor', 'diploma', 'post_grad', 'o_level', 'a_level'
            ));
            $table->string('min_gpa', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('batch_education_constraint', function($table) {
            $table->foreign('batch_id')->references('id')->on('batch');
        });


        //TODO : adm question
        Schema::create('adm_question', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_admtest_subject_id')->nullable();
            $table->unsignedInteger('examiner_faculty_user_id')->nullable();
            $table->string('title', 128);
            $table->dateTime('deadline');
            $table->string('total_marks', 8);
            $table->tinyInteger('status', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question', function($table) {
            $table->foreign('batch_admtest_subject_id')->references('id')->on('batch_admtest_subject');
            $table->foreign('examiner_faculty_user_id')->references('id')->on('user');
        });


        // TODO: Exm Center Applicant Choice
        Schema::create('exm_center_applicant_choice', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_applicant_id')->nullable();
            $table->unsignedInteger('exm_center_id')->nullable();
            $table->text('note');
            $table->tinyInteger('status', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_center_applicant_choice', function($table) {
            $table->foreign('batch_applicant_id')->references('id')->on('batch_applicant');
            $table->foreign('exm_center_id')->references('id')->on('exm_center');
        });



        Schema::create('waiver_constraint', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_waiver_id')->nullable();
            $table->tinyInteger('is_time_dependent', false)->lenght(1);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('level_of_education',array(
                'PSC', 'JSC', 'SSC', 'HSC', 'GRAD', 'UNDER_GRAD', 'BACHELOR', 'DIPLOMA', 'POST_GRAD', 'O_LEVEL', 'A_LEVEL'
            ));
            $table->string('gpa', 16);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('waiver_constraint', function($table) {
            $table->foreign('batch_waiver_id')->references('id')->on('batch_waiver');
        });

        //TODO :: adm question items
        Schema::create('adm_question_items', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('adm_question_id')->nullable();
            $table->enum('question_type',array(
                'text', 'radio', 'checkbox'
            ));
            $table->string('title', 128);
            $table->string('marks', 8);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question_items', function($table) {
            $table->foreign('adm_question_id')->references('id')->on('adm_question');
        });


        //TODO adm question comments
        Schema::create('adm_question_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('adm_question_id')->nullable();
            $table->text('comment');
            $table->integer('commented_to', false, 11);
            $table->integer('commented_by', false, 11);

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question_comments', function($table) {
            $table->foreign('adm_question_id')->references('id')->on('adm_question');
        });


        // TODO adm question evaluation
        Schema::create('adm_question_evaluation', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('batch_applicant_id')->nullable();
            $table->unsignedInteger('adm_question_id')->nullable();
            $table->unsignedInteger('adm_question_items_id')->nullable();
            $table->string('marks', 8);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question_evaluation', function($table) {
            $table->foreign('batch_applicant_id')->references('id')->on('batch_applicant');
            $table->foreign('adm_question_id')->references('id')->on('adm_question');
            $table->foreign('adm_question_items_id')->references('id')->on('adm_question_items');
        });


        //TOdo :: adm question option answer
        Schema::create('adm_question_opt_ans', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('adm_question_items_id')->nullable();
            $table->string('title', 128);
            $table->tinyInteger('answer', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question_opt_ans', function($table) {
            $table->foreign('adm_question_items_id')->references('id')->on('adm_question_items');
        });




        Schema::create('adm_question_ans_text', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('adm_question_evaluation_id')->nullable();
            $table->text('answer');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question_ans_text', function($table) {
            $table->foreign('adm_question_evaluation_id')->references('id')->on('adm_question_evaluation');
        });


        Schema::create('adm_question_ans_radio', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('adm_question_evaluation_id')->nullable();
            $table->tinyInteger('answer', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question_ans_radio', function($table) {
            $table->foreign('adm_question_evaluation_id')->references('id')->on('adm_question_evaluation');
        });


        Schema::create('adm_question_ans_checkbox', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('adm_question_evaluation_id')->nullable();
            $table->tinyInteger('answer', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question_ans_checkbox', function($table) {
            $table->foreign('adm_question_evaluation_id')->references('id')->on('adm_question_evaluation');
        });


	}


	public function down()
	{
        Schema::drop('degree');
        Schema::drop('batch');
        Schema::drop('degree_course');
        Schema::drop('batch_course');
        Schema::drop('course_enrollment');
        Schema::drop('course_conduct');
        Schema::drop('course_conduct_comments');
        Schema::drop('adm_examiner');
        Schema::drop('adm_examiner_comments');
        Schema::drop('batch_admtest_subject');
        Schema::drop('batch_applicant');
        Schema::drop('batch_waiver');
        Schema::drop('batch_education_constraint');
        Schema::drop('adm_question');
        Schema::drop('exm_center_applicant_choice');
        Schema::drop('waiver_constraint');
        Schema::drop('adm_question_items');
        Schema::drop('adm_question_comments');
        Schema::drop('adm_question_evaluation');
        Schema::drop('adm_question_opt_ans');
        Schema::drop('adm_question_ans_text');
        Schema::drop('adm_question_ans_radio');
        Schema::drop('adm_question_ans_checkbox');
	}

}
