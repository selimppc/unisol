<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseManagementRl extends Migration {

	public function up()
	{
        Schema::create('year', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('title', false, 4);
            $table->text('description');
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



        Schema::create('course_type', function(Blueprint $table){
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        //TODO
        //This should not be here as it can be used as ENUM values
        // Values: 'Under Graduate', 'Graduate', 'Post Graduate', 'Post Doctorate'
        /*Schema::create('degree_level', function(Blueprint $table){
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });*/

        // TODO : This table seed will be after removing of degree_program table
        /*Schema::create('degree_program', function($table) {
            $table->increments('id');
            $table->string('code', 128);
            $table->string('title', 128);
            $table->string('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });*/


        Schema::create('subject', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('department_id')->nullable();
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('subject', function($table) {
            $table->foreign('department_id')->references('id')->on('department');
        });



        Schema::create('course', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->string('course_code', 8);
            $table->unsignedInteger('subject_id')->nullable();
            $table->text('description');
            $table->decimal('evaluation_total_marks', 5, 2);
            $table->decimal('credit', 4, 2);
            $table->decimal('hours_per_credit', 4, 2);
            $table->float('cost_per_credit');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('course', function($table) {
            $table->foreign('subject_id')->references('id')->on('subject');
        });


        //TODO
        //This should not be here as it will be used as ENUM
        // Values: 'Automatic', 'Manual'
        /*Schema::create('evolution_system', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        }); */


        Schema::create('course_management', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('course_id')->nullable();
            $table->unsignedInteger('year_id')->nullable();
            $table->unsignedInteger('semester_id')->nullable();
            $table->unsignedInteger('course_type_id')->nullable();
            $table->enum('evolution_system', array(
                'automatic', 'manual'
            ));
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('major_minor', array(
                'major', 'minor'
            ));
            $table->integer('degree_id', false, 11);

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('course_management', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('course_id')->references('id')->on('course');
            $table->foreign('year_id')->references('id')->on('year');
            $table->foreign('semester_id')->references('id')->on('semester');
            $table->foreign('course_type_id')->references('id')->on('course_type');
            //$table->foreign('evolution_system_id')->references('id')->on('evolution_system');
        });

	}

	public function down()
	{
        Schema::drop('year');
        Schema::drop('semester');
        Schema::drop('course_type');
        //Schema::drop('degree_level');
        //Schema::drop('degree_program');
        Schema::drop('subject');
        Schema::drop('course');
        //Schema::drop('evolution_system');
        Schema::drop('course_management');

	}

}
