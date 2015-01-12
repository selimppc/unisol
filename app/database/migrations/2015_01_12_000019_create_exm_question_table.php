<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExmQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exm_question', function(Blueprint $table)
		{
			$table->increments('id',true);

            $table->unsignedInteger('exm_exam_list_id');
            $table->foreign('exm_exam_list_id')->references('id')->on('exm_exam_list');

            $table->string('title');

            $table->string('deadline');

            $table->string('created_by');


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
		Schema::drop('exm_question');
	}

}
