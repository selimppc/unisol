<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrary extends Migration {

	public function up()
	{
        Schema::create('lib_book_category', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('code', 128);
            $table->string('title', 128);
            $table->text('description');
            $table->enum('status', array(
                'open', 'close', 'active', 'inactive'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });



        Schema::create('lib_book_author', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('name', 128);
            $table->string('email', 128);
            $table->string('phone', 128);
            $table->text('address');
            $table->unsignedInteger('country_id')->nullable();
            $table->text('note');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('lib_book_author', function($table) {
            $table->foreign('country_id')->references('id')->on('country');
        });

        Schema::create('lib_book_publisher', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('name', 128);
            $table->string('company_name', 128);
            $table->string('email', 128);
            $table->string('phone', 128);
            $table->text('address');
            $table->unsignedInteger('country_id')->nullable();
            $table->text('note');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('lib_book_publisher', function($table) {
            $table->foreign('country_id')->references('id')->on('country');
        });


        Schema::create('lib_settings', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->string('value', 32);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });





        Schema::create('lib_books', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 128);
            $table->string('isbn', 128);
            $table->unsignedInteger('lib_book_category_id')->nullable();
            $table->unsignedInteger('lib_book_author_id')->nullable();
            $table->unsignedInteger('lib_book_publisher_id')->nullable();
            $table->string('edition', 128);
            $table->enum('stock_type', array(
                'hard', 'soft', 'both'
            ));
            $table->string('shelf_number',128);
            $table->enum('book_type', array(
                'books', 'journal', 'etc'
            ));
            $table->enum('commercial', array(
                'student', 'both'
            ));
            $table->string('file', 128);
            $table->string('book_price', 128);
            $table->string('digital_sell_price', 128);
            $table->enum('is_rented', array(
                'yes', 'no'
            ));

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('lib_books', function($table) {
            $table->foreign('lib_book_category_id')->references('id')->on('lib_book_category');
            $table->foreign('lib_book_author_id')->references('id')->on('lib_book_author');
            $table->foreign('lib_book_publisher_id')->references('id')->on('lib_book_publisher');
        });





        Schema::create('lib_book_transaction', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('lib_books_id')->nullable();

            $table->dateTime('issue_date');
            $table->dateTime('return_date');
            $table->enum('status', array(
                'received','returned', 'delay', 'cancel'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('lib_book_transaction', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('lib_books_id')->references('id')->on('lib_books');
        });




        Schema::create('lib_book_financial_transaction', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('lib_book_transaction_id')->nullable();

            $table->string('amount', 32);
            $table->enum('trn_type', array(
                'delay', 'commercial'
            ));
            $table->enum('status', array(
                'due', 'paid', 'close'
            ));

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('lib_book_financial_transaction', function($table) {
            $table->foreign('lib_book_transaction_id')->references('id')->on('lib_book_transaction');
        });


	}


	public function down()
	{
        Schema::drop('lib_book_category');
        Schema::drop('lib_book_author');
        Schema::drop('lib_book_publisher');
        Schema::drop('lib_settings');
        Schema::drop('lib_books');
        Schema::drop('lib_book_transaction');
        Schema::drop('lib_book_financial_transaction');

	}

}
