<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBirthdayUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('users', function(Blueprint $table)
            {
               $table->date('birthday')->after('gender')->nullable();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('users', function($table)
            {
                $table->dropColumn('birthday');
            });
	}

}
