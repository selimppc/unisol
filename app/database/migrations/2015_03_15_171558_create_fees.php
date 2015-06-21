<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFees extends Migration {


	public function up()
	{
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

        Schema::create('billing_summary_student', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_user_id')->nullable();
            $table->unsignedInteger('billing_schedule_id')->nullable();
            $table->decimal('total_cost', 10);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_summary_student', function($table) {
            $table->foreign('student_user_id')->references('id')->on('user');
            $table->foreign('billing_schedule_id')->references('id')->on('billing_schedule');
        });

        Schema::create('billing_details_student', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billing_summary_student_id')->nullable();
            $table->unsignedInteger('billing_item_id')->nullable();
            $table->unsignedInteger('waiver_id')->nullable();
            $table->decimal('waiver_amount', 10);
            $table->decimal('cost_per_unit', 10);
            $table->decimal('quantity', 10);
            $table->decimal('total_amount', 10);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_details_student', function($table) {
            $table->foreign('billing_summary_student_id')->references('id')->on('billing_summary_student');
            $table->foreign('billing_item_id')->references('id')->on('billing_item');
            $table->foreign('waiver_id')->references('id')->on('waiver');
        });

        Schema::create('billing_tuition_details', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billing_summary_student_id')->nullable();
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
        Schema::table('billing_tuition_details', function($table) {
            $table->foreign('billing_summary_student_id')->references('id')->on('billing_summary_student');
            $table->foreign('student_user_id')->references('id')->on('user');
            $table->foreign('year_id')->references('id')->on('year');
        });


        //TODO :: Applicant's Billing Summary and Details
        Schema::create('billing_summary_applicant', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('applicant_id')->nullable();
            $table->unsignedInteger('billing_schedule_id')->nullable();
            $table->decimal('total_cost', 10);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_summary_applicant', function($table) {
            $table->foreign('applicant_id')->references('id')->on('applicant');
            $table->foreign('billing_schedule_id')->references('id')->on('billing_schedule');
        });

        Schema::create('billing_details_applicant', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('billing_summary_applicant_id')->nullable();
            $table->unsignedInteger('billing_item_id')->nullable();
            $table->unsignedInteger('waiver_id')->nullable();
            $table->decimal('waiver_amount', 10);
            $table->decimal('cost_per_unit', 10);
            $table->decimal('quantity', 10);
            $table->decimal('total_amount', 10);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('billing_details_applicant', function($table) {
            $table->foreign('billing_summary_applicant_id')->references('id')->on('billing_summary_applicant');
            $table->foreign('billing_item_id')->references('id')->on('billing_item');
            $table->foreign('waiver_id')->references('id')->on('waiver');
        });
	}


	public function down()
	{
        Schema::drop('billing_schedule');
        Schema::drop('billing_setup');
        Schema::drop('billing_summary_student');
        Schema::drop('billing_details_student');
        Schema::drop('billing_tuition_details');
        Schema::drop('billing_summary_applicant');
        Schema::drop('billing_details_applicant');
	}

}
