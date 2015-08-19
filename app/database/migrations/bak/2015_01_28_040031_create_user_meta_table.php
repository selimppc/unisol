<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user_meta', function(Blueprint $table)
        {
            $table->increments('id',true);
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('fathers_name',128);
            $table->string('mothers_name',128);
            $table->string('fathers_occupation',32);
            $table->string('fathers_phone',16);
            $table->integer('freedom_fighter',false,1);
            $table->string('mothers_occupation',32);
            $table->string('mothers_phone',16);
            $table->string('national_id',32);
            $table->string('driving_license',32);
            $table->string('passport',32);
            $table->string('place_of_birth',32);
            $table->string('marital_status',32);
            $table->string('nationality',32);
            $table->string('religion',32);
            $table->string('signature',128);
            $table->text('present_address');
            $table->text('parmanent_address');
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
        Schema::table('user_meta', function($table) {
            $table->drop();
        });
	}

}
