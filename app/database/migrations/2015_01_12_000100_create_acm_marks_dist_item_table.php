<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcmMarksDistItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acm_marks_dist_item', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title',128);
            //$table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
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
		Schema::drop('acm_marks_dist_item');
	}

}
