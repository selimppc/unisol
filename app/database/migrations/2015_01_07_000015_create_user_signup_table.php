<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSignupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user_signup', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('firstname',32);
            $table->string('middlename',32);
            $table->string('lastname',32);
            $table->string('email',64);
            $table->string('username',32);
            $table->string('password',32);
            $table->string('targetrole',32);
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();

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
        Schema::table('user_signup', function($table) {
            $table->drop();
        });
	}

}
