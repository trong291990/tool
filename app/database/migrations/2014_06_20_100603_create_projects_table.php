<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            
            Schema::create('projects',function (Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->datetime('start_at');
                $table->datetime('plan_end_at');
                $table->datetime('actual_end_at')->nullable();
                $table->integer('created_by');
                $table->integer('scrum_master_id');
                $table->integer('product_owner_id');
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
            Schema::drop('projects');
	}

}
