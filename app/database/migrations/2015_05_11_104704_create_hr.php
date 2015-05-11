<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHr extends Migration {

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

        Schema::create('hr_bank', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('bank_name', 32);
            $table->string('branch', 32);
            $table->text('address');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });

        Schema::create('hr_tax_rule', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->float('salary_from');
            $table->float('salary_to');
            $table->decimal('tax');
            $table->enum('gender', array(
                'male', 'female'
            ));
            $table->string('nationality', 32);
            $table->float('additional_tax_amount');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });

        Schema::create('hr_allowance', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 32);
            $table->string('code', 8);
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });

        Schema::create('hr_salary_grade', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('code', 8);
            $table->string('title', 32);
            $table->text('description');
            $table->float('min_amount');
            $table->float('max_amount');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });


        Schema::create('hr_employee', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('user_id')->nullable();
            $table->string('employee_id', 32);
            $table->dateTime('date_of_joining');
            $table->dateTime('date_of_confirmation');
            $table->unsignedInteger('hr_salary_grade_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->unsignedInteger('hr_bank_id')->nullable();
            $table->string('bank_account_no', 32);
            $table->unsignedInteger('currency_id')->nullable();
            $table->float('exchange_rate');

            $table->enum('employee_type', array(
                'permanent', 'full-time', 'contractual', 'part-time', 'one-time', 'project', 'support'
            ));
            $table->enum('employee_category', array(
                'professional', 'auxiliary', 'technical',
            ));
            $table->enum('work_shift', array(
                'day', 'evening', 'night',
            ));
            $table->string('emergency_contact_person', 32);
            $table->string('emergency_contact_number', 32);
            $table->string('emergency_contact_relationship', 32);
            $table->text('note');
            $table->string('status', 32);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_employee', function($table) {
            $table->foreign('user_id')->references('id')->on('currency');
            $table->foreign('hr_salary_grade_id')->references('id')->on('hr_salary_grade');
            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('designation_id')->references('id')->on('designation');
            $table->foreign('hr_bank_id')->references('id')->on('hr_bank');
            $table->foreign('currency_id')->references('id')->on('currency');
        });




        //TODO::
        Schema::table('rnc_financial_transaction', function($table) {
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('currency_id')->references('id')->on('currency');
        });
	}

	public function down()
	{
        Schema::drop('hr_bank');
        Schema::drop('currency');
        Schema::drop('hr_tax_rule');
        Schema::drop('hr_allowance');
        Schema::drop('hr_salary_grade');
        Schema::drop('hr_employee');

        Schema::drop('hr_load_head');
        Schema::drop('hr_load_detail');
        Schema::drop('hr_over_time');
        Schema::drop('hr_bonus');

        Schema::drop('hr_salary');

        Schema::drop('hr_salary_deduction');
        Schema::drop('hr_salary_allowance');
        Schema::drop('hr_advance_salary');

        Schema::drop('hr_salary_transaction');
        Schema::drop('hr_salary_transaction_detail');

        Schema::drop('hr_attendance');
        Schema::drop('hr_leave_type');
        Schema::drop('hr_leave');
        Schema::drop('hr_leave_comments');

        Schema::drop('hr_work_week');

        Schema::drop('hr_provident fund');
        Schema::drop('hr_provident_fund_config');

	}

}
