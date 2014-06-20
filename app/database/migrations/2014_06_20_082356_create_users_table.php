<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{   
            Schema::create('users',function(Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->string('email');
                $table->string('gender');
                $table->string('password');
                $table->string('avatar');
                $table->string('phone_number')->nullable();
                $table->string('street_address')->nullable();
                $table->string('city')->nullable();
                $table->string('country')->nullable();
                $table->string('experience',1023)->nullable();
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
            Schema::drop('users');
	}

}
