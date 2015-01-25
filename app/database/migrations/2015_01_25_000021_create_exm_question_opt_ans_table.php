<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExmQuestionOptAnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exm_question_opt_ans', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('exm_question_items_id');
            $table->string('title');
            $table->string('answer');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
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
		Schema::drop('exm_question_opt_ans');
	}

}
