<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('project_name');
                        $table->text('project_description');
                        $table->date('plan_start_date');
                        $table->date('plan_end_date');
                        $table->date('actual_start_date');
                        $table->date('actual_end_date');
                        $table->float('estimated');
                        $table->integer('project_manager');
                        $table->integer('created_by');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
