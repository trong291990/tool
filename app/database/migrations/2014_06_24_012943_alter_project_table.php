<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement("ALTER TABLE `projects` CHANGE COLUMN `actual_end_date` `actual_end_date` DATE  NULL");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            DB::statement("ALTER TABLE `projects` CHANGE COLUMN `actual_end_date` `actual_end_date` DATE NOT  NULL");
	}

}
