<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTaskUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_task_user', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('role_task_id');
                        $table->foreign('role_task_id')->references('id')->on('role_task');
			
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('user');
			
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
		Schema::drop('role_task_user');
	}

}
