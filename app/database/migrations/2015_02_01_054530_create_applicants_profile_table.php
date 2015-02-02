<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('applicants_profile', function(Blueprint $table)
        {
            $table->increments('id',true);
            $table->unsignedInteger('applicant_id')->index();
            $table->foreign('applicant_id')->references('id')->on('applicant');
            $table->dateTime('date_of_birth');
            $table->string('birth_place',16);
            $table->string('gender',8);
            $table->string('profile_image',128);
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
        Schema::table('applicants_profile', function($table) {
            $table->drop();
        });
	}

}
