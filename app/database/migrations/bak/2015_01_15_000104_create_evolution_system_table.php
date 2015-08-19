<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvolutionSystemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evolution_system', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('created_by',32);
            $table->string('updated_by',32);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('evolution_system');
	}

}
