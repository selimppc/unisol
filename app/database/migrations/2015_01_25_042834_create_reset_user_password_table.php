<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResetUserPasswordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('reset_user_password', function(Blueprint $table)
        {
            $table->increments('id', true);

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('user_signup');

            $table->dateTime('reset_password_time');
            $table->dateTime('reset_password_expire');
            $table->string('reset_password_token');
            $table->tinyInteger('status', false, 1);
            $table->integer('created_by', false);
            $table->integer('updated_by', false);
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
        Schema::table('reset_user_password', function($table) {
            $table->drop();
        });
	}

}
