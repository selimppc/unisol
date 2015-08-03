<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchConsultancy extends Migration {

	public function up()
	{
        Schema::create('currency', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 32);
            $table->string('code', 8);
            $table->float('exchange_rate');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });

        Schema::create('rnc_category', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });


        Schema::create('rnc_config', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->integer('value', false, 8);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });

        Schema::create('rnc_publisher', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('code', 128);
            $table->string('title', 128);
            $table->text('description');

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });


        Schema::create('rnc_research_paper', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->text('abstract');
            $table->unsignedInteger('rnc_category_id')->nullable();
            $table->unsignedInteger('where_published_id')->nullable();
            $table->string('publication_no', 16);
            $table->text('details');
            $table->string('file', 64);
            $table->string('free_type_student', 2);
            $table->string('free_type_faculty', 2);
            $table->string('free_type_non_user', 2);
            $table->enum('searching', array(
                'yes', 'no'
            ));
            $table->string('benefit_share', 2);
            $table->float('price');
            $table->text('note');
            $table->enum('status', array(
                'open', 'close', 'approved', 'reviewed' , 'published'
            ));
            $table->integer('reviewed_by', false, 11);

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('rnc_research_paper', function($table) {
            $table->foreign('rnc_category_id')->references('id')->on('rnc_category');
            $table->foreign('where_published_id')->references('id')->on('rnc_publisher');
        });

//        Schema::create('rnc_research_paper_comment', function(Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('rnc_research_paper_id')->nullable();
//            $table->text('comments');
//            $table->integer('commented_to', false, 11);
//            $table->integer('commented_by', false, 11);
//            $table->integer('created_by', false, 11);
//            $table->integer('updated_by', false, 11);
//            $table->timestamps();
//            $table->engine = 'InnoDB';
//        });
//        Schema::table('rnc_research_paper_comment', function($table) {
//            $table->foreign('rnc_research_paper_id')->references('id')->on('rnc_research_paper');
//        });

        Schema::create('rnc_research_paper_writer', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('rnc_research_paper_id')->nullable();
            $table->unsignedInteger('writer_user_id')->nullable();
            $table->text('note');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('rnc_research_paper_writer', function($table) {
            $table->foreign('rnc_research_paper_id')->references('id')->on('rnc_research_paper');
            $table->foreign('writer_user_id')->references('id')->on('user');
        });



        Schema::create('rnc_transaction', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('rnc_research_paper_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->dateTime('issue_date');
            $table->string('count', 11);

            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->float('total_amount');

            $table->enum('status', array(
                'viewed', 'received', 'purchased', 'confirmed', 'invoiced'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('rnc_transaction', function($table) {
            $table->foreign('rnc_research_paper_id')->references('id')->on('rnc_research_paper');
            $table->foreign('user_id')->references('id')->on('user');
        });



        Schema::create('rnc_transaction_financial', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('rnc_transaction_id')->nullable();
            $table->enum('transaction_type', array(
                'partial', 'full'
            ));

            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();

            $table->float('amount');
            $table->enum('status', array(
                'closed', 'open'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('rnc_transaction_financial', function($table) {
            $table->foreign('rnc_transaction_id')->references('id')->on('rnc_transaction');
        });



        Schema::create('rnc_research_paper_comment', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rnc_research_paper_id')->nullable();
            $table->text('comments');
            $table->integer('commented_to', false, 11);
            $table->integer('commented_by', false, 11);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('rnc_research_paper_comment', function($table) {
            $table->foreign('rnc_research_paper_id')->references('id')->on('rnc_research_paper');
        });



        Schema::create('rnc_writer_beneficial', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('rnc_research_paper_id')->nullable();
            $table->unsignedInteger('rnc_research_paper_writer_id')->nullable();
            $table->string('value',5);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('rnc_writer_beneficial', function($table) {
            $table->foreign('rnc_research_paper_id')->references('id')->on('rnc_research_paper');
            $table->foreign('rnc_research_paper_writer_id')->references('id')->on('rnc_research_paper_writer');
        });

	}

	public function down()
	{
        Schema::drop('currency');
        Schema::drop('rnc_category');
        Schema::drop('rnc_config');
        Schema::drop('rnc_research_paper');
        Schema::drop('rnc_publisher');
        Schema::drop('rnc_research_paper_writer');
        Schema::drop('rnc_transaction');
        Schema::drop('rnc_financial_transaction');

        Schema::drop('rnc_research_paper_comment');
        Schema::drop('rnc_writer_beneficial');
	}

}
