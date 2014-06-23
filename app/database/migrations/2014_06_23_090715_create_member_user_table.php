<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('member_user',function (Blueprint $table){
                $table->increments('id');
                $table->integer('member_id');
                $table->integer('project_id');
                $table->tinyInteger('is_available')->default(1);
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
            Schema::drop('member_user');
	}

}
