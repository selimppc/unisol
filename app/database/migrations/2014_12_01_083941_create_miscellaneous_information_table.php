<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiscellaneousInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('miscellaneous_information', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('user_id');
            $table->integer('ever_admit_this_university');
            $table->integer('ever_dismissed');
            $table->string('academic_honors_received',64);
            $table->string('ever_admit_other_uni');
            $table->string('admission_test_center',64);

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
		Schema::drop('miscellaneous_information');
	}

}
