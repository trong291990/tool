<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameProjectTablesColumProjectOwnerProductOwner extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
             DB::statement('ALTER TABLE `projects` CHANGE COLUMN `project_owner` `product_owner` INT(11) NULL');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement('ALTER TABLE `projects` CHANGE COLUMN `product_owner` `project_owner` INT(11) NULL');
	}

}
