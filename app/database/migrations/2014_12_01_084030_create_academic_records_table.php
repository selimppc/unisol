<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('academic_records', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('user_id');
            $table->string('level_of_education',32);
            $table->string('degree_name',32);
            $table->string('institute_name',63);
            $table->string('board',32);
            $table->string('group',32);
            $table->string('major_subject',32);
            $table->string('result_type',32);
            $table->string('result',32);
            $table->string('grade',32);
            $table->integer('grade_scale');
            $table->decimal('cgpa',2,2);
            $table->string('candidate_number',32);
            $table->string('education_medium',32);
            $table->string('study_at',32);
            $table->integer('year_of_passing');
            $table->decimal('duration',1,0);
            $table->string('certificate',32);
            $table->string('transcript',32);

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
		Schema::drop('academic_records');
	}

}
