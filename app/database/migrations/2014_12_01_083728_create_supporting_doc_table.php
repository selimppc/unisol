<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportingDocTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supporting_doc', function(Blueprint $table)
		{
            $table->increments('id')->unsigned();

            $table->integer('user_id');
            $table->string('academic_goal_statement',64);
            $table->string('essay',64);
            $table->string('letter_of_intent',64);
            $table->string('personal_statement',64);
            $table->string('research_statement',64);
            $table->string('portfolio',64);
            $table->string('writing_sample',64);
            $table->string('resume',64);
            $table->string('readmission_personal_statement',64);
            $table->string('other',64);


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
		Schema::drop('supporting_doc');
	}

}
