<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddGroupFiedUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
             Schema::table('users', function(Blueprint $table)
            {
               $table->tinyInteger('group_id')->after('email')->default(3);
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
                $table->dropColumn('group_id');
            });
	}

}
