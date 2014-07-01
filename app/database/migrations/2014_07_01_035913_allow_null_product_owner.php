<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullProductOwner extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('projects', function(Blueprint $table)
            {
                $table->renameColumn('project_manager', 'product_owner');
            });
            DB::statement("ALTER TABLE `projects` CHANGE COLUMN `product_owner` `project_manager` INT(11) NULL ");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('projects', function(Blueprint $table)
            {
                $table->renameColumn('product_owner', 'project_manager');
            });
            DB::statement("ALTER TABLE `projects` CHANGE COLUMN `product_owner` `product_owner` INT(11) NOT NULL ");
	}

}
