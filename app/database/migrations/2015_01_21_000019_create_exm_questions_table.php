<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExmQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exm_questions', function(Blueprint $table)
		{
            $table->increments('id',true);

            $table->unsignedInteger('exm_exam_lists_id');
            $table->foreign('exm_exam_lists_id')->references('id')->on('exm_exam_lists');

            $table->string('title');

            $table->string('deadline');

            $table->string('total_marks');

            $table->integer('created_by');
            $table->integer('updated_by');

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
		Schema::drop('exm_questions');
	}

}
