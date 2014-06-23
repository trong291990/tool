<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('project_goals', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('project_id');
                $table->string('subject',127);
                $table->text('description');
                $table->string('status');
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
		Schema::drop('project_goals');
	}

}
