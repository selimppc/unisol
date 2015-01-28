<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResetUsernameTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('reset_username', function(Blueprint $table)
        {
            $table->increments('id', true);

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('user_signup');
            $table->string('reset_username_token');
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
        Schema::table('reset_username', function($table) {
            $table->drop();
        });
	}

}
