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
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
        Schema::create('course_type', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('year', function (Blueprint $table) {

            $table->increments('id', true);
            $table->integer('title');
            $table->text('description');
            $table->timestamps();
            $table->engine = 'InnoDB';

        });

        Schema::create('department', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->text('description');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::create('subject', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 128);
            $table->unsignedInteger('department_id')->index();
            $table->foreign('department_id')->references('id')->on('department');
            $table->text('description');
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
	}

}
