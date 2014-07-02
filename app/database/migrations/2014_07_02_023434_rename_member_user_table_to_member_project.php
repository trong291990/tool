<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameMemberUserTableToMemberProject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement('ALTER TABLE `member_user` RENAME TO `member_project`');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement('ALTER TABLE `member_project` RENAME TO `member_user`');
	}

}
