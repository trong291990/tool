<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumProject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table('projects', function(Blueprint $table)
            {
                $table->renameColumn('project_name', 'name');
                $table->renameColumn('project_description', 'description');
            });
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
                $table->renameColumn('name', 'project_name');
                $table->renameColumn('description', 'project_description');
            });
	}

}
