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



	}

	public function down()
	{
        Schema::drop('adm_examiner');
        Schema::drop('adm_examiner_comments');
        Schema::drop('admtest_subject');
        Schema::drop('degree_admtest_subject');
        Schema::drop('adm_question');
	}

}
