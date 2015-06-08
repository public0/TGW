<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQuizzTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_quiz', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();

			$table->integer('quiz_id')->unsigned();

			$table->integer('assignement_id')->unsigned();

			$table->integer('mark')->unsigned();
			$table->boolean('done')->defaul(0);

			$table->string('reason');
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
		Schema::drop('user_quizz');
	}

}
