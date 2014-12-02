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

            $table->string('username',32)->unique();
            $table->string('password',32);
            $table->string('email_address',32)->unique();
            $table->string('user_type',32);
            $table->date('join_date',32);
            $table->date('last_visit',32);
            $table->string('ip_address',32);
            $table->string('security_question',64);
            $table->string('security_answer',64);


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
