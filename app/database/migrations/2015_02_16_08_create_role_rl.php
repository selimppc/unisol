<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleRl extends Migration {



	public function up()
	{
        Schema::create('user_additional_role', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->dateTime('assigned_date');
            $table->dateTime('uphold_date');
            $table->integer('assigned_by', false)->lenght(11);
            $table->integer('uphold_by', false)->lenght(11);
            $table->tinyInteger('status', false)->lenght(1);
            $table->integer('created_by', false)->lenght(11);
            $table->integer('updated_by', false)->lenght(11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('user_additional_role', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('role_id')->references('id')->on('role');
        });

        Schema::create('designation', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id')->nullable();
            $table->string('title', 128);
            $table->text('description', 128);
            $table->tinyInteger('status', false)->lenght(1);
            $table->integer('created_by', false)->lenght(11);
            $table->integer('updated_by', false)->lenght(11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('designation', function($table) {
            $table->foreign('role_id')->references('id')->on('role');
        });

        Schema::create('amw_user_assignment', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('task_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('permission', 128);
            $table->integer('created_by', false)->lenght(11);
            $table->integer('updated_by', false)->lenght(11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('amw_user_assignment', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
        });

	}

	public function down()
	{
        Schema::drop('user_additional_role');
        Schema::drop('designation');
        Schema::drop('amw_user_assignment');
	}




}
