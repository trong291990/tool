<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('stories',function (Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->string('description',1023);
                $table->integer('project_id');
                $table->integer('sprint_id')->nullable();
                $table->integer('created_by');
                $table->integer('priority')->default(1);
                $table->tinyInteger('status')->default(0);
                $table->integer('point');
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
            Schema::drop('stories');
	}

}
