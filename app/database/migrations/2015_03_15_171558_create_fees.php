<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFees extends Migration {


	public function up()
	{
        Schema::create('payment_option', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 16)->unique();
            $table->string('title', 32)->nullable();
            $table->string('bank_branch', 32)->nullable();
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('billing_schedule', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('code',array(
                'admission', 'apply-for-admission', 'enrollment', 'tuition-fee'
            ));
            $table->string('title', 128);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });


        Schema::create('billing_setup', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billing_item_id')->nullable();
            $table->unsignedInteger('billing_schedule_id')->nullable();
            $table->unsignedInteger('batch_id')->nullable();
            $table->decimal('cost', 10);
            $table->dateTime('deadline');
            $table->decimal('fined_cost', 10);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_setup', function($table) {
            $table->foreign('billing_item_id')->references('id')->on('billing_item');
            $table->foreign('billing_schedule_id')->references('id')->on('billing_schedule');
            $table->foreign('batch_id')->references('id')->on('batch');
        });


        Schema::create('installment_setup', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billing_item_id')->nullable();
            $table->unsignedInteger('billing_schedule_id')->nullable();
            $table->unsignedInteger('batch_id')->nullable();
            $table->decimal('cost', 10);
            $table->dateTime('deadline');
            $table->decimal('fined_cost', 10);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('installment_setup', function($table) {
            $table->foreign('billing_item_id')->references('id')->on('billing_item');
            $table->foreign('billing_schedule_id')->references('id')->on('billing_schedule');
            $table->foreign('batch_id')->references('id')->on('batch');
        });


        //TODO :: Student's Billing Summary and Details with Tuition Fees

        Schema::create('billing_student_head', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_user_id')->nullable();
            $table->unsignedInteger('billing_schedule_id')->nullable();
            $table->unsignedInteger('payment_option_id')->nullable();

            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->decimal('discount_rate')->nullable();
            $table->float('discount_amount')->nullable();

            $table->decimal('total_cost', 10);
            $table->enum('status', array(
                'open', 'close', 'approved', 'confirmed', 'cancel', 'balanced', 'post', 'posted', 'invoiced'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_student_head', function($table) {
            $table->foreign('student_user_id')->references('id')->on('user');
            $table->foreign('billing_schedule_id')->references('id')->on('billing_schedule');
        });

        Schema::create('billing_student_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billing_student_head_id')->nullable();
            $table->unsignedInteger('billing_item_id')->nullable();
            $table->unsignedInteger('waiver_id')->nullable();
            $table->decimal('waiver_amount', 10);
            $table->decimal('cost_per_unit', 10);
            $table->decimal('quantity', 10);
            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->decimal('total_amount', 10);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_student_detail', function($table) {
            $table->foreign('billing_student_head_id')->references('id')->on('billing_student_head');
            $table->foreign('billing_item_id')->references('id')->on('billing_item');
            $table->foreign('waiver_id')->references('id')->on('waiver');
        });

        Schema::create('billing_tuition_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billing_student_head_id')->nullable();
            $table->unsignedInteger('student_user_id')->nullable();
            $table->unsignedInteger('year_id')->nullable();
            $table->enum('month',array(
                'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_tuition_detail', function($table) {
            $table->foreign('billing_student_head_id')->references('id')->on('billing_student_head');
            $table->foreign('student_user_id')->references('id')->on('user');
            $table->foreign('year_id')->references('id')->on('year');
        });


        //TODO :: Applicant's Billing Summary and Details
        Schema::create('billing_applicant_head', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->unsignedInteger('billing_schedule_id')->nullable();
            $table->unsignedInteger('payment_option_id')->nullable();

            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->decimal('discount_rate')->nullable();
            $table->float('discount_amount')->nullable();

            $table->decimal('total_cost', 10);
            $table->enum('status', array(
                'open', 'close', 'approved', 'confirmed', 'cancel', 'balanced', 'post', 'posted', 'invoiced'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_applicant_head', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
            $table->foreign('billing_schedule_id')->references('id')->on('billing_schedule');
        });

        Schema::create('billing_applicant_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billing_applicant_head_id')->nullable();
            $table->unsignedInteger('billing_item_id')->nullable();
            $table->unsignedInteger('waiver_id')->nullable();
            $table->decimal('waiver_amount', 10);
            $table->decimal('cost_per_unit', 10);
            $table->decimal('quantity', 10);
            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->decimal('total_amount', 10);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_applicant_detail', function($table) {
            $table->foreign('billing_applicant_head_id')->references('id')->on('billing_applicant_head');
            $table->foreign('billing_item_id')->references('id')->on('billing_item');
            $table->foreign('waiver_id')->references('id')->on('waiver');
        });
	}


	public function down()
	{
        Schema::drop('payment_option');
        Schema::drop('billing_schedule');
        Schema::drop('billing_setup');
        Schema::drop('billing_student_head');
        Schema::drop('billing_student_detail');
        Schema::drop('billing_tuition_detail');
        Schema::drop('billing_applicant_head');
        Schema::drop('billing_applicant_detail');

	}



}
