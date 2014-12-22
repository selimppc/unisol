<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeLevelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{ 
	 Schema::create('degree_level', function($table)
		{
			$table->increments('id', true);
			$table->string('title', 128);
			$table->longText('description');
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
		Schema::drop('degree_level');
	}

}
