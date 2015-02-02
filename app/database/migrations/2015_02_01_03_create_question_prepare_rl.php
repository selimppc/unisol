<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionPrepareRl extends Migration {

	public function up()
	{
        Schema::create('acm_marks_dist_item', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->tinyInteger('is_associate',false, 1);
            $table->tinyInteger('is_exam',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });




        Schema::create('exm_exam_list', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('year_id')->nullable();
            $table->unsignedInteger('semester_id')->nullable();
            $table->string('title', 128);
            $table->unsignedInteger('acm_marks_dist_item_id')->nullable();
            $table->tinyInteger('status',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_exam_list', function($table) {
            $table->foreign('year_id')->references('id')->on('year');
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('acm_marks_dist_item_id')->references('id')->on('acm_marks_dist_item');
        });



        Schema::create('exm_examiner', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_exam_list_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('type', 128);
            $table->integer('assigned_by', false, 11);
            $table->date('deadline');
            $table->text('note');
            $table->tinyInteger('status',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_examiner', function($table) {
            $table->foreign('exm_exam_list_id')->references('id')->on('exm_exam_list');
            $table->foreign('user_id')->references('id')->on('user');
        });


        Schema::create('exm_examiner_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_exam_list_id')->nullable();
            $table->text('comment');
            $table->integer('commented_to', false, 11);
            $table->integer('commented_by', false, 11);
            $table->tinyInteger('status',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_examiner_comments', function($table) {
            $table->foreign('exm_exam_list_id')->references('id')->on('exm_exam_list');
        });



        Schema::create('exm_question', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_exam_list_id')->nullable();
            $table->unsignedInteger('course_management_id')->nullable();
            $table->unsignedInteger('examiner_faculty_user_id')->nullable();
            $table->string('title', 128);
            $table->date('deadline');
            $table->string('total_marks', 128);
            $table->tinyInteger('status',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question', function($table) {
            $table->foreign('exm_exam_list_id')->references('id')->on('exm_exam_list');
            $table->foreign('course_management_id')->references('id')->on('course_management');
            $table->foreign('examiner_faculty_user_id')->references('id')->on('user');
        });


        Schema::create('exm_question_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_question_id')->nullable();
            $table->text('comment');
            $table->integer('commented_to', false, 11);
            $table->integer('commented_by', false, 11);
            $table->tinyInteger('status',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question_comments', function($table) {
            $table->foreign('exm_question_id')->references('id')->on('exm_question');
        });



        Schema::create('exm_question_items', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_question_id')->nullable();
            $table->string('question_type', 32);
            $table->string('title', 128);
            $table->string('marks', 8);
            $table->tinyInteger('status',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question_items', function($table) {
            $table->foreign('exm_question_id')->references('id')->on('exm_question');
        });



        Schema::create('exm_question_opt_ans', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_question_items_id')->nullable();
            $table->string('title', 128);
            $table->tinyInteger('answer',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question_opt_ans', function($table) {
            $table->foreign('exm_question_items_id')->references('id')->on('exm_question_items');
        });

	}


	public function down()
	{
        Schema::drop('exm_exam_list');
        Schema::drop('acm_marks_dist_item');
        Schema::drop('exm_examiner');
        Schema::drop('exm_examiner_comments');
        Schema::drop('exm_question');
        Schema::drop('exm_question_comments');
        Schema::drop('exm_question_items');
        Schema::drop('exm_question_opt_ans');
	}

}
