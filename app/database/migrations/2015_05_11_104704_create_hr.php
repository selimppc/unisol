<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHr extends Migration {

	public function up()
	{

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

//        Schema::create('currency', function(Blueprint $table)
//        {
//            $table->increments('id', true);
//            $table->string('title', 32);
//            $table->string('code', 32);
//            $table->float('exchange_rate');
//            $table->integer('created_by', false, 11);
//            $table->integer('updated_by', false, 11);
//            $table->timestamps();
//        });

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
            $table->string('type', 32);
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
            $table->enum('status', array(
                'open', 'closed', 'not-in-service'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_employee', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('hr_salary_grade_id')->references('id')->on('hr_salary_grade');
            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('designation_id')->references('id')->on('designation');
            $table->foreign('hr_bank_id')->references('id')->on('hr_bank');
            $table->foreign('currency_id')->references('id')->on('currency');
        });



        Schema::create('hr_loan_head', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->string('title', 32);
            $table->float('loan_amount');
            $table->dateTime('loan_date');
            $table->float('monthly_repayment_amount');
            $table->dateTime('payment_start_date');
            $table->text('description');
            $table->decimal('number_of_installment', 2, 0);
            $table->enum('work_shift', array(
                'new', 'running', 'complete',
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_loan_head', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
        });



        Schema::create('hr_loan_detail', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_loan_head_id')->nullable();
            $table->float('amount');
            $table->dateTime('date');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_loan_detail', function($table) {
            $table->foreign('hr_loan_head_id')->references('id')->on('hr_loan_head');
        });



        Schema::create('hr_over_time', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->dateTime('sign_in');
            $table->dateTime('sign_out');
            $table->enum('status', array(
                'active', 'close',
            ));
            $table->float('unit_cost');
            $table->integer('quantity');
            $table->float('amount');


            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_over_time', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
        });


        Schema::create('hr_bonus', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->string('title', 32);
            $table->float('amount');
            $table->dateTime('date');
            $table->enum('status', array(
                'active', 'close',
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_bonus', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
        });




        Schema::create('hr_salary', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->enum('salary_type', array(
                'monthly', 'weekly', 'yearly', 'hourly'
            ));
            $table->unsignedInteger('currency_id')->nullable();
            $table->float('exchange_rate');
            $table->float('gross');
            $table->float('basic');
            $table->enum('status', array(
                'active', 'close',
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_salary', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
            $table->foreign('currency_id')->references('id')->on('currency');
        });


        Schema::create('hr_salary_advance', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->string('title', 32);
            $table->float('amount');
            $table->dateTime('date');
            $table->text('description');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_salary_advance', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
        });




        Schema::create('hr_salary_deduction', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->string('title', 32);
            $table->enum('type', array(
                'loan', 'salary-advance', 'tax', 'other'
            ));
            $table->unsignedInteger('hr_loan_head_id')->nullable();
            $table->unsignedInteger('hr_salary_advance_id')->nullable();
            $table->float('amount');
            $table->dateTime('date');
            $table->enum('status', array(
                'active', 'close',
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_salary_deduction', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
            $table->foreign('hr_loan_head_id')->references('id')->on('hr_loan_head');
            $table->foreign('hr_salary_advance_id')->references('id')->on('hr_salary_advance');
        });




        Schema::create('hr_salary_allowance', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_salary_id')->nullable();
            $table->unsignedInteger('hr_allowance_id')->nullable();
            $table->string('title', 32);
            $table->enum('is_percentage', array(
                'yes', 'no',
            ));
            $table->float('percentage');
            $table->enum('allowance_type', array(
                '%-of-basic', 'fixed-amount',
            ));
            $table->float('amount');
            $table->enum('status', array(
                'active', 'close',
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_salary_allowance', function($table) {
            $table->foreign('hr_salary_id')->references('id')->on('hr_salary');
            $table->foreign('hr_allowance_id')->references('id')->on('hr_allowance');
        });






        Schema::create('hr_salary_transaction_head', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('trn_number', 32);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->dateTime('date');
            $table->unsignedInteger('year_id')->nullable();

            $table->string('period');
            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->float('total_amount')->nullable();
            $table->enum('status', array(
                'open', 'ask-for-interview', 'approved', 'denied', 'request-for-update',
                'confirmed', 'invoiced'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_salary_transaction_head', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
            $table->foreign('year_id')->references('id')->on('year');
        });







        Schema::create('hr_salary_transaction_detail', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('salary_trn_hd_id')->nullable();
            $table->enum('type', array(
                'allowance', 'deduction', 'over-time', 'bonus', 'commission'
            ));

            $table->unsignedInteger('hr_salary_allowance_id')->nullable();
            $table->unsignedInteger('hr_salary_deduction_id')->nullable();
            $table->unsignedInteger('hr_over_time_id')->nullable();
            $table->unsignedInteger('hr_bonus_id')->nullable();
            $table->decimal('tax_rate')->nullable();
            $table->float('tax_amount')->nullable();
            $table->float('percentage', 8, 2);
            $table->float('amount');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_salary_transaction_detail', function($table) {
            $table->foreign('salary_trn_hd_id')->references('id')->on('hr_salary_transaction_head');
            $table->foreign('hr_salary_allowance_id')->references('id')->on('hr_salary_allowance');
            $table->foreign('hr_salary_deduction_id')->references('id')->on('hr_salary_deduction');
            $table->foreign('hr_over_time_id')->references('id')->on('hr_over_time');
            $table->foreign('hr_bonus_id')->references('id')->on('hr_bonus');
        });




        Schema::create('hr_attendance', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();

            $table->dateTime('date');
            $table->dateTime('sign_in_time');
            $table->dateTime('sign_out_time');

            $table->dateTime('lunch_break_out_time');
            $table->dateTime('lunch_break_in_time');
            $table->dateTime('break_out_time');
            $table->dateTime('break_in_time');
            $table->text('note');

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_attendance', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
        });



        Schema::create('hr_leave_type', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('title', 32);
            $table->string('code', 8);
            $table->enum('employee_type', array(
                'permanent', 'full-time', 'part-time', 'contractual', 'project'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });





        Schema::create('hr_leave', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->unsignedInteger('forward_to')->nullable();
            $table->unsignedInteger('hr_leave_type_id')->nullable();
            $table->text('reason');

            $table->enum('leave_duration', array(
                'full-day', 'half-day'
            ));
            $table->dateTime('from_date');
            $table->dateTime('to_date');

            $table->string('alt_contact_no', 32);
            $table->unsignedInteger('alt_hr_employee_id')->nullable();
            $table->enum('status', array(
                'rejected', 'canceled', 'pending-approval', 'scheduled', 'taken', 'approved'
            ));

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_leave', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
            $table->foreign('forward_to')->references('id')->on('user');
            $table->foreign('hr_leave_type_id')->references('id')->on('hr_leave_type');
            $table->foreign('alt_hr_employee_id')->references('id')->on('hr_employee');
        });



        Schema::create('hr_leave_comments', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_leave_id')->nullable();
            $table->text('comment');

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_leave_comments', function($table) {
            $table->foreign('hr_leave_id')->references('id')->on('hr_leave');
        });




        Schema::create('hr_work_week', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('year_id')->nullable();
            $table->enum('month', array(
                'january', 'february', 'march', 'april', 'may', 'june',
                'july', 'august', 'september', 'october', 'november', 'december'
            ));
            $table->enum('day', array(
                'saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday',
                'friday',
            ));
            $table->enum('status', array(
                'full-day', 'half-day', 'not-working-day', 'weekend', 'holiday', 'vacation',
            ));

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_work_week', function($table) {
            $table->foreign('year_id')->references('id')->on('year');
        });



        Schema::create('hr_provident_fund', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('hr_employee_id')->nullable();
            $table->dateTime('date');
            $table->enum('month', array(
                'january', 'february', 'march', 'april', 'may', 'june',
                'july', 'august', 'september', 'october', 'november', 'december'
            ));
            $table->float('employee_contribution_amount');
            $table->float('company_contribution_amount');
            $table->enum('status', array(
                'open', 'pending', 'approved', 'cancel',
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('hr_provident_fund', function($table) {
            $table->foreign('hr_employee_id')->references('id')->on('hr_employee');
        });



        Schema::create('hr_provident_fund_config', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->enum('employee_type', array(
                'permanent'
            ));
            $table->decimal('contribution_amount', 8,2);
            $table->decimal('company_contribution_0', 8,2);
            $table->decimal('company_contribution_25', 8,2);
            $table->decimal('company_contribution_50', 8,2);
            $table->decimal('company_contribution_75', 8,2);
            $table->decimal('company_contribution_100', 8,2);

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });


        Schema::create('hr_trn_no_setup', function(Blueprint $table) {
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

	}

	public function down()
	{
        Schema::drop('hr_bank');
        #Schema::drop('currency');

        Schema::drop('hr_tax_rule');
        Schema::drop('hr_allowance');
        Schema::drop('hr_salary_grade');
        Schema::drop('hr_employee');

        Schema::drop('hr_loan_head');
        Schema::drop('hr_loan_detail');
        Schema::drop('hr_over_time');
        Schema::drop('hr_bonus');

        Schema::drop('hr_salary');

        Schema::drop('hr_salary_deduction');
        Schema::drop('hr_salary_allowance');
        Schema::drop('hr_salary_advance');

        Schema::drop('hr_salary_transaction_head');
        Schema::drop('hr_salary_transaction_detail');

        Schema::drop('hr_attendance');
        Schema::drop('hr_leave_type');
        Schema::drop('hr_leave');
        Schema::drop('hr_leave_comments');

        Schema::drop('hr_work_week');

        Schema::drop('hr_provident fund');
        Schema::drop('hr_provident_fund_config');
        Schema::drop('hr_trn_no_setup');

	}

}
