<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('target_role', function(Blueprint $table)
		{
            $table->increments('id', true);
            $table->string('code');
            $table->string('title');
            $table->text('description');
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
		Schema::drop('target_role');
	}

}
