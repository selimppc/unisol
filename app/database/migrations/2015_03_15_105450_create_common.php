<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommon extends Migration {

	public function up()
	{
        Schema::create('country', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 16);
            $table->string('title', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('semester', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
        Schema::create('course_type', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('year', function (Blueprint $table) {

            $table->increments('id', true);
            $table->integer('title')->unique();
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';

        });

        Schema::create('department', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->text('description');
            $table->unsignedInteger('dept_head_user_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('subject', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 128);
            $table->unsignedInteger('department_id')->nullable();
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('subject', function($table) {
            $table->foreign('department_id')->references('id')->on('department');
        });

        Schema::create('degree_level', function($table) {
            $table->increments('id');
            $table->string('code', 128);
            $table->string('title', 128);
            $table->string('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('degree_program', function($table) {
            $table->increments('id');
            $table->string('code', 128);
            $table->string('title', 128);
            $table->string('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('degree_group', function($table) {
            $table->increments('id');
            $table->string('code', 128);
            $table->string('title', 128);
            $table->string('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('exm_center', function($table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->string('description');
            $table->string('capacity', 128);
            $table->string('status', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('billing_item', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->tinyInteger('is_unit_qty', false)->length('1');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('waiver', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->string('waiver_type', 64);
            $table->tinyInteger('is_percentage', false, 1)->lenght(1);
            $table->string('amount', 64);
            $table->unsignedInteger('billing_details_id')->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        /*Schema::table('waiver', function($table) {
            $table->foreign('billing_details_id')->references('id')->on('billing_item');
        });*/

        Schema::create('course', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->string('course_code', 128);
            $table->unsignedInteger('subject_id')->nullable();
            $table->unsignedInteger('course_type_id')->nullable();
            $table->text('description');
            $table->string('evaluation_total_marks', 64);
            $table->string('credit', 64);
            $table->string('hours_per_credit', 64);
            $table->string('cost_per_credit', 64);
            $table->enum('evaluation_system',array(
                'manual', 'automatic'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('course', function($table) {
            $table->foreign('subject_id')->references('id')->on('subject');
            $table->foreign('course_type_id')->references('id')->on('course_type');
        });

        Schema::create('admtest_subject', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->string('priority', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('role', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8);
            $table->string('title', 128);
            $table->text('description');
            $table->tinyInteger('status', false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('designation', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8);
            $table->string('title', 128);
            $table->text('description');
            $table->tinyInteger('status', false, 1);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('board_university', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 8);
            $table->string('title', 128);
            $table->string('country', 128);
            $table->enum('board_type',array(
                'board', 'university', 'other'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


	}


	public function down()
	{
        Schema::drop('country');
        Schema::drop('semester');
        Schema::drop('course_type');
        Schema::drop('year');
        Schema::drop('department');
        Schema::drop('subject');
        Schema::drop('degree_program');
        Schema::drop('degree_group');
        Schema::drop('exm_center');
        Schema::drop('billing_item');
        Schema::drop('waiver');
        Schema::drop('course');
        Schema::drop('admtest_subject');
        Schema::drop('role');
        Schema::drop('board_university');

	}

}
