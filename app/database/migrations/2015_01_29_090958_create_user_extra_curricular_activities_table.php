<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExtraCurricularActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user_extra_curricular_activities', function(Blueprint $table)
        {
            $table->increments('id',true);
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('title',128);
            $table->text('description');
            $table->text('achivement');
            $table->string('certificate_medal',128);
            $table->integer('created_by',false);
            $table->integer('updated_by',false);
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
        Schema::table('user_extra_curricular_activities', function($table) {
            $table->drop();
        });
	}

}
