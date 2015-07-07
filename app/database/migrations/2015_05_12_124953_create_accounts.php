<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccounts extends Migration {

	public function up()
	{
        Schema::create('bank', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',32);
            $table->string('branch',32);
            $table->text('address');
            $table->string('phone',32);
            $table->string('contact_person',32);
            $table->string('contact_person_phone',32);
            $table->string('contact_person_designation',32);
            $table->text('note');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });



        Schema::create('acc_chart_of_accounts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('account_code', 8);
            $table->text('description');
            $table->enum('account_type', array(
                'asset', 'liability', 'income', 'expense'
            ));
            $table->enum('account_usage', array(
                'ledger', 'ap', 'ar'
            ));
            $table->string('group_one', 8);
            $table->string('group_two', 8);
            $table->enum('analytical_code', array(
                'cash', 'non-cash'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('acc_transaction', function(Blueprint $table) {
            $table->increments('id');
            $table->string('type',32);
            $table->string('code',8);
            $table->decimal('last_number', 8,0);
            $table->decimal('increment', 1,0);
            $table->enum('active', array(
                'yes', 'no'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('acc_voucher_head', function(Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_number',32);
            $table->enum('type', array(
                'account-payable', 'account-receivable', 'stock-adjustment',
                'journal-voucher', 'payment-voucher', 'receipt-voucher', 'reverse-entry',
            ));
            $table->dateTime('date');
            $table->text('reference');
            $table->unsignedInteger('year_id')->nullable();
            $table->decimal('period', 2, 0);
            $table->text('note');
            $table->enum('status', array(
                'open', 'close', 'approved', 'confirmed', 'cancel', 'balanced', 'post', 'posted'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acc_voucher_head', function($table) {
            $table->foreign('year_id')->references('id')->on('year');
        });



        Schema::create('acc_voucher_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acc_voucher_head_id')->nullable();
            $table->unsignedInteger('acc_chart_of_accounts_id')->nullable();
            $table->string('sub_account_code',32);
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->float('exchange_rate');
            $table->float('prime_amount');
            $table->float('base_amount');
            $table->text('note');

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acc_voucher_detail', function($table) {
            $table->foreign('acc_voucher_head_id')->references('id')->on('acc_voucher_head');
            $table->foreign('acc_chart_of_accounts_id')->references('id')->on('acc_chart_of_accounts');
            $table->foreign('inv_supplier_id')->references('id')->on('inv_supplier');
            $table->foreign('currency_id')->references('id')->on('currency');
        });



        Schema::create('acc_ap_allocation', function(Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_number',32);
            $table->unsignedInteger('acc_voucher_head_id')->nullable();
            $table->dateTime('date');
            $table->unsignedInteger('currency_id')->nullable();
            $table->float('exchange_rate');
            $table->float('prime_amount');
            $table->float('base_amount');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acc_ap_allocation', function($table) {
            $table->foreign('acc_voucher_head_id')->references('id')->on('acc_voucher_head');
            $table->foreign('currency_id')->references('id')->on('currency');
        });


        Schema::create('acc_codesparam', function(Blueprint $table) {
            $table->increments('id');
            $table->string('type',32)->nullable();
            $table->string('code',32)->nullable();
            $table->text('description')->nullable();
            $table->string('account_code',32)->nullable();
            $table->string('account_disc',32)->nullable();
            $table->string('account_transaction',32)->nullable();
            $table->string('account_debit',32)->nullable();
            $table->string('account_tax',32)->nullable();
            $table->enum('status',array(
                'active', 'close'
            ))->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('acc_trn_no_setup', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 4)->unique();
            $table->string('title', 32)->nullable();
            $table->integer('last_number', false, 10)->nullable();
            $table->integer('increment', false, 1)->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });



        Schema::create('acc_balance', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('acc_voucher_head_id')->nullable();
            $table->unsignedInteger('acc_chart_of_accounts_id')->nullable();
            $table->unsignedInteger('inv_supplier_id')->nullable();
            $table->date('date')->nullable();
            $table->text('reference')->nullable();
            $table->unsignedInteger('year_id')->nullable();
            $table->string('period', 2)->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->float('prime_amount')->nullable();
            $table->float('base_amount')->nullable();
            $table->string('status', 16)->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('acc_balance', function($table) {
            $table->foreign('acc_voucher_head_id')->references('id')->on('acc_voucher_head');
            $table->foreign('acc_chart_of_accounts_id')->references('id')->on('acc_chart_of_accounts');
            $table->foreign('inv_supplier_id')->references('id')->on('inv_supplier');
            $table->foreign('year_id')->references('id')->on('year');
            $table->foreign('currency_id')->references('id')->on('currency');
        });

	}


	public function down()
	{
        Schema::drop('bank');
        Schema::drop('acc_chart_of_accounts');
        Schema::drop('acc_transaction');

        Schema::drop('acc_voucher_head');
        Schema::drop('acc_voucher_detail');
        Schema::drop('acc_ap_allocation');
        Schema::drop('acc_codesparam');
        Schema::drop('acc_trn_no_setup');
        Schema::drop('acc_balance');

	}

}
