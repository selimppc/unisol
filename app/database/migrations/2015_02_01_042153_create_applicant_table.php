<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('applicant', function(Blueprint $table)
        {
            $table->increments('id',true);
            $table->string('first_name',128);
            $table->string('last_name',128);
            $table->string('username')->unique();
            $table->string('email_address')->unique();
            $table->string('password');
            $table->dateTime('reg_date');
            $table->dateTime('last_visit');
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
        Schema::table('applicant', function($table) {
            $table->drop();
        });
	}

}
