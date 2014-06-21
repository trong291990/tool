<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

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
                $table->string('description',1023);
                $table->integer('story_id');
                $table->integer('created_by');
                $table->integer('assigned_to');
                $table->integer('estimated');
                $table->integer('remaining');
                $table->datetime('end_at')->nullable();
                $table->integer('priority')->default(1);
                $table->tinyInteger('status')->default(0);
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('tasks');
	}

}
