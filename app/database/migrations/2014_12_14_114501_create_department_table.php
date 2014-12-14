<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('department', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128);
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
        Schema::table('department', function($table) {
            $table->dropIndex('search');
            $table->drop();
        });
	}

}
