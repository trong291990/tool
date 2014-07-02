<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameProjectsTableProjectManagerColum extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement('ALTER TABLE `projects` CHANGE COLUMN `project_manager` `project_owner` INT(11) NULL');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement('ALTER TABLE `projects` CHANGE COLUMN `project_owner` `project_manager` INT(11) NULL');
	}

}
