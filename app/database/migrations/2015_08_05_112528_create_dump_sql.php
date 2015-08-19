<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDumpSql extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Accounts Data
		DB::unprepared(file_get_contents("src/sql_dump/acc_chart_of_accounts.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/acc_codesparam.sql"));


		// Hr Data
		/*hr_allowance
		hr_bank
		hr_bonus
		hr_employee
		hr_loan_detail
		hr_loan_head
		hr_over_time
		hr_salary
		hr_salary_advance
		hr_salary_allowance
		hr_salary_deduction
		hr_salary_grade
		hr_salary_transaction_detail
		hr_salary_transaction_head
		hr_tax_rule
		hr_trn_no_setup
		hr_attendance
		hr_leave
		hr_provident_fund
		hr_leave_comments */

		DB::unprepared(file_get_contents("src/sql_dump/hr_attendance.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/hr_leave.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/hr_provident_fund.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/hr_loan_head.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/hr_salary.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/hr_bonus.sql"));


		// Library Data
		DB::unprepared(file_get_contents("src/sql_dump/lib_books.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/lib_book_author.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/lib_book_category.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/lib_book_publisher.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/lib_book_transaction.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/lib_book_transaction_financial.sql"));


		//RNC DATA
		DB::unprepared(file_get_contents("src/sql_dump/rnc_category.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/rnc_config.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/rnc_publisher.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/rnc_research_paper.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/rnc_research_paper_comment.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/rnc_research_paper_writer.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/rnc_transaction.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/rnc_transaction_financial.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/rnc_writer_beneficial.sql"));





	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
