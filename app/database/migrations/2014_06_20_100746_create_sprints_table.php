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
                $table->date('start_date');
                $table->date('plan_end_date');
                $table->date('actual_end_date')->nullable();
                $table->integer('created_by');
                $table->tinyInteger('status')->default(0);
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
            Schema::drop('sprints');
	}

}
