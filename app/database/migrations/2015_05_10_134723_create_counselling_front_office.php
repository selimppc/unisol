<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounsellingFrontOffice extends Migration {

	public function up()
	{
        Schema::create('cfo_category', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128)->nullable();
            $table->text('description')->nullable();
            $table->string('support_name', 64)->nullable();
            $table->string('support_email', 64)->nullable();
            $table->unsignedInteger('support_user_id')->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
        });
        Schema::table('cfo_category', function($table) {
            $table->foreign('support_user_id')->references('id')->on('user');
        });


        Schema::create('cfo_knowledge_base', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('cfo_category_id')->nullable();
            $table->string('title', 128)->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
        });
        Schema::table('cfo_knowledge_base', function($table) {
            $table->foreign('cfo_category_id')->references('id')->on('cfo_category');
        });



        Schema::create('cfo_knowledge_base_rating', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('cfo_knowledge_base_id')->nullable();
            $table->string('value', 1)->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
        });



        Schema::create('cfo_support_head', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('cfo_category_id')->nullable();
            $table->string('name', 64)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('subject', 128)->nullable();
            $table->enum('priority', array(
                'high', 'low', 'medium'
            ));
            $table->string('support_code', 128)->nullable();
            $table->enum('status', array(
                'new', 'open', 'replied', 'closed'
            ));

            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
        });
        Schema::table('cfo_support_head', function($table) {
            $table->foreign('cfo_category_id')->references('id')->on('cfo_category');
        });



        Schema::create('cfo_support_detail', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('cfo_support_head_id')->nullable();
            $table->text('message')->nullable();
            $table->enum('replied_by', array(
                'staff', 'user'
            ));
            $table->unsignedInteger('support_user_id')->nullable();

            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
        });
        Schema::table('cfo_support_detail', function($table) {
            $table->foreign('cfo_support_head_id')->references('id')->on('cfo_support_head');
            $table->foreign('support_user_id')->references('id')->on('user');
        });


	}

	public function down()
	{
        Schema::drop('cfo_category');
        Schema::drop('cfo_knowledge_base');
        Schema::drop('cfo_knowledge_base_rating');
        Schema::drop('cfo_support_head');
        Schema::drop('cfo_support_detail');
	}

}
