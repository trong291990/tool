<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullProjectActualStartDate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            DB::statement('ALTER TABLE `sfr_pm`.`projects` CHANGE COLUMN `actual_start_date` `actual_start_date` DATE NULL ');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
             DB::statement('ALTER TABLE `sfr_pm`.`projects` CHANGE COLUMN `actual_start_date` `actual_start_date` DATE NOT NULL ');
	}

}
