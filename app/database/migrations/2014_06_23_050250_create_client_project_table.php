<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
           Schema::create('client_project',function (Blueprint $table){
                $table->increments('id');
                $table->integer('client');
                $table->integer('project_id');
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
            Schema::drop('client_project');
	}

}
