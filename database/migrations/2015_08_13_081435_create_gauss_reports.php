<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaussReports extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gauss_reports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('quiz_id')->unsigned();
			$table->foreign('quiz_id')->references('id')->on('quizzes');

			$table->integer('very_bad');
			$table->integer('bad');
			$table->integer('medium');
			$table->integer('good');
			$table->integer('very_good');

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
		Schema::drop('gauss_reports');
	}

}
