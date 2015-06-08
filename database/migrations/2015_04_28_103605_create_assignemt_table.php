<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignemtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('assigned_job')->unsigned();
			$table->foreign('assigned_job')->references('id')->on('jobs');

			$table->integer('assigned_user')->unsigned();
			$table->foreign('assigned_user')->references('id')->on('users');

			$table->dateTime('started_at');
			$table->dateTime('ended_at');

			$table->boolean('status')->default(0);
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
		Schema::drop('assignements');
	}

}
