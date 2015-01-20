<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnToUserSignupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('user_signup', function($table)
        {
            $table->renameColumn('firstname', 'first_name');
            $table->renameColumn('middlename', 'middle_name');
            $table->renameColumn('lastname', 'last_name');

        });
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
