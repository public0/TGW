<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGivenAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('given_answers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('assignement_id')->unsigned();
			$table->integer('quiz_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->integer('answer_id')->unsigned()->nullable();
			$table->integer('points')->unsigned()->default(0);
			$table->text('answer')->nullable();

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
		Schema::drop('given_answers');
	}

}
