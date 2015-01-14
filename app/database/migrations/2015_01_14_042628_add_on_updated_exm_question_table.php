<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnUpdatedExmQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('exm_question', function(Blueprint $table)
		{
			$table->integer('total_marks')->after('deadline');
            $table->integer('created_by')->after('total_marks');
            $table->integer('updated_by')->after('created_by');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('exm_question', function(Blueprint $table)
		{
			//
		});
	}

}
