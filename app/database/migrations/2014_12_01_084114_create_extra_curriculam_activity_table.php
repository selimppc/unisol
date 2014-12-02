<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraCurriculamActivityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extra_curriculam_activity', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('user_id');
            $table->string('name',32);
            $table->string('achievement',32);
            $table->string('certificate_medal',32);

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
		Schema::drop('extra_curriculam_activity');
	}

}
