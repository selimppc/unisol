<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassScheduleRl extends Migration {

	public function up()
	{
        Schema::create('acm_class_time', function(Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
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

	}


	public function down()
	{
        Schema::drop('acm_class_time');
        Schema::drop('acm_class_room');
        Schema::drop('acm_class_schedule');
	}

}
