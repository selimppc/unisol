<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('role_task', function($table) {
            $table->increments('id', true);

//            $table->unsignedInteger('target_role_id');
//            $table->foreign('target_role_id')->references('id')->on('target_role');
//
//            $table->unsignedInteger('task_list_id');
//            $table->foreign('task_list_id')->references('id')->on('task_list');

            $table->string('title');
            $table->text('description');

            $table->string('status');

            $table->timestamps();
            $table->engine = 'InnoDB';
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('role_task', function($table) {
            $table->drop();
        });
	}

}
