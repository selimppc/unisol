<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVerifiedCodeToApplicantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('applicant', function(Blueprint $table)
		{
            $table->string('verified_code')->nullable()->after('last_visit');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('applicant', function(Blueprint $table)
		{
			//
		});
	}

}
