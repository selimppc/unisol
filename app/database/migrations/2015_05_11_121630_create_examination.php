<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamination extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
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


        Schema::create('exm_question_opt_ans', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_question_items_id')->nullable();
            $table->string('title', 128);
            $table->tinyInteger('answer',false, 1);
            $table->integer('status', false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question_opt_ans', function($table) {
            $table->foreign('exm_question_items_id')->references('id')->on('exm_question_items');
        });


        Schema::create('exm_question_evaluation', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_user_id')->nullable();
            $table->unsignedInteger('exm_question_id')->nullable();
            $table->unsignedInteger('exm_question_items_id')->nullable();
            $table->string('marks', 8);
            $table->text('note');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question_evaluation', function($table) {
            $table->foreign('student_user_id')->references('id')->on('user');
            $table->foreign('exm_question_id')->references('id')->on('exm_question');
            $table->foreign('exm_question_items_id')->references('id')->on('exm_question_items');
        });


        Schema::create('exm_question_ans_text', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_question_evaluation_id')->nullable();
            $table->text('answer');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question_ans_text', function($table) {
            $table->foreign('exm_question_evaluation_id')->references('id')->on('exm_question_evaluation');
        });


        Schema::create('exm_question_ans_radio', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_question_evaluation_id')->nullable();
            $table->tinyInteger('answer',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question_ans_radio', function($table) {
            $table->foreign('exm_question_evaluation_id')->references('id')->on('exm_question_evaluation');
        });


        Schema::create('exm_question_ans_checkbox', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exm_question_evaluation_id')->nullable();
            $table->tinyInteger('answer',false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('exm_question_ans_checkbox', function($table) {
            $table->foreign('exm_question_evaluation_id')->references('id')->on('exm_question_evaluation');
        });


	}


	public function down()
	{
        Schema::drop('exm_question_items');
        Schema::drop('exm_question_comments');
        Schema::drop('exm_question_opt_ans');
        Schema::drop('exm_question_evaluation');
        Schema::drop('exm_question_ans_text');
        Schema::drop('exm_question_ans_radio');
        Schema::drop('exm_question_ans_checkbox');

	}

}
