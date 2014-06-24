<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('documents', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('name');
                $table->string('full_url');
                $table->integer('project_id')->nullable();
                $table->integer('story_id')->nullable();
                $table->integer('task_id')->nullable();
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
            Scheme::drop('documents');
	}

}
