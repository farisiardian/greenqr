<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('role')->nullable();
			$table->string('name');
			$table->string('email')->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps(10);
			$table->boolean('active_status')->default(0);
			$table->string('profile_image')->nullable();
			$table->string('background_image')->nullable();
			$table->string('avatar')->default('avatar.png');
			$table->boolean('dark_mode')->default(0);
			$table->string('messenger_color')->nullable();
			$table->date('deleted_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
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
