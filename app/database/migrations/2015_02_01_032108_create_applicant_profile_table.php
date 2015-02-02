<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('applicant_profile', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('applicant');
            $table->string('first_name',64);
            $table->string('middle_name',64);
            $table->string('last_name',64);
            $table->dateTime('date_of_birth');
            $table->string('gender',8);
            $table->string('image',64);
            $table->string('city',16);
            $table->string('state',16);
            $table->string('country',16);
            $table->integer('zip_code',false,16);
            $table->integer('created_by',false);
            $table->integer('updated_by',false);
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
        Schema::table('applicant_profile', function($table) {
            $table->drop();
        });
	}

}
