<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('tasks',function(Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->string('description',2055);
                $table->integer('story_id');
                $table->integer('assigned_to');
                $table->datetime('sloved_at')->nullable();
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
            Schema::drop('bugs');
	}

}
