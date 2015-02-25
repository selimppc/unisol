<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionTestRl extends Migration {

	public function up()
	{
        Schema::create('adm_examiner', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('degree_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('type', 128);
            $table->integer('assigned_by', false, 11);
            $table->dateTime('deadline');
            $table->text('note');
            $table->tinyInteger('status', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_examiner', function($table) {
            $table->foreign('degree_id')->references('id')->on('degree');
            $table->foreign('user_id')->references('id')->on('user');
        });


        Schema::create('adm_examiner_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('degree_id')->nullable();
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
            $table->foreign('degree_id')->references('id')->on('degree');
        });


        Schema::create('admtest_subject', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('degree_admtest_subject', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('degree_id')->nullable();
            $table->unsignedInteger('admtest_subject_id')->nullable();
            $table->text('description');
            $table->string('marks', 8);
            $table->string('duration', 16);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('degree_admtest_subject', function($table) {
            $table->foreign('degree_id')->references('id')->on('degree');
            $table->foreign('admtest_subject_id')->references('id')->on('admtest_subject');
        });


        Schema::create('adm_question', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('degree_admtest_subject_id')->nullable();
            $table->unsignedInteger('examiner_faculty_id')->nullable();

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
                   $table->foreign('degree_admtest_subject_id')->references('id')->on('degree_admtest_subject');
            $table->foreign('examiner_faculty_id')->references('id')->on('user');
        });



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


        Schema::create('adm_question_opt_ans', function(Blueprint $table) {
            $table->increments('id');
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



        Schema::create('adm_question_evaluation', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('degree_applicant_id')->nullable();
            $table->unsignedInteger('adm_question_id')->nullable();
            $table->unsignedInteger('adm_question_items_id')->nullable();
            $table->string('marks', 8);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('adm_question_evaluation', function($table) {
            $table->foreign('degree_applicant_id')->references('id')->on('degree_applicant');
            $table->foreign('adm_question_id')->references('id')->on('adm_question');
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



        Schema::create('exm_center', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->string('capacity', 128);
            $table->tinyInteger('status', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('exm_center_applicant_choice', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('degree_applicant_id')->nullable();
            $table->unsignedInteger('exm_center_id')->nullable();
            $table->text('note');
            $table->tinyInteger('status', false)->length(1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_center_applicant_choice', function($table) {
            $table->foreign('degree_applicant_id')->references('id')->on('degree_applicant');
            $table->foreign('exm_center_id')->references('id')->on('exm_center');
        });



	}

	public function down()
	{
        Schema::drop('adm_examiner');
        Schema::drop('adm_examiner_comments');
        Schema::drop('admtest_subject');
        Schema::drop('degree_admtest_subject');
        Schema::drop('adm_question');
        Schema::drop('adm_question_items');
        Schema::drop('adm_question_opt_ans');
        Schema::drop('adm_question_evaluation');
        Schema::drop('adm_question_ans_text');
        Schema::drop('adm_question_ans_radio');
        Schema::drop('adm_question_ans_checkbox');
        Schema::drop('exm_center');
        Schema::drop('exm_center_applicant_choice');
	}

}
