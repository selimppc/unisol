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
