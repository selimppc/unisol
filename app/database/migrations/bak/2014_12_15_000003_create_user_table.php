<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('username')->unique();
			$table->string('password');
			$table->string('email_address')->unique();
			$table->string('user_type');
			$table->dateTime('join_date');
			$table->dateTime('last_visit');
			$table->string('ip_address');

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
		Schema::drop('user');
	}

}
