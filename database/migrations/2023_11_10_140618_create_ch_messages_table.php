<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ch_messages', function(Blueprint $table)
		{
			$table->char('id', 36)->primary();
			$table->bigInteger('from_id');
			$table->bigInteger('to_id');
			$table->string('body', 5000)->nullable();
			$table->string('attachment')->nullable();
			$table->boolean('seen')->default(0);
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ch_messages');
	}

}
