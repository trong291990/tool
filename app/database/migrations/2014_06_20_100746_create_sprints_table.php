<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            
            Schema::create('sprints',function (Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->integer('project_id');
                $table->datetime('start_at');
                $table->datetime('plan_end_at');
                $table->datetime('actual_end_at')->nullable();
                $table->integer('created_by');
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
            Schema::drop('sprints');
	}

}
