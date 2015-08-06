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

		DB::unprepared(file_get_contents("src/sql_dump/acc_chart_of_accounts.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/acc_codesparam.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/hr_attendance.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/hr_leave.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/hr_provident_fund.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/lib_book_transaction.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/lib_book_transaction_financial.sql"));


		DB::unprepared(file_get_contents("src/sql_dump/acc_codesparam.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/acc_codesparam.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/acc_codesparam.sql"));
		DB::unprepared(file_get_contents("src/sql_dump/acc_codesparam.sql"));

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
