<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('subject', function(Blueprint $table) {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->unsignedInteger('department_id')->index();
            $table->foreign('department_id')->references('id')->on('department');
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
        Schema::table('subject', function($table) {
            $table->drop();
        });
	}

}
