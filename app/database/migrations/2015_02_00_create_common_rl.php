<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonRl extends Migration {

	public function up()
	{
        Schema::create('country', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 16);
            $table->string('title', 128);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
	}

	public function down()
	{
        Schema::drop('country');
	}

}
