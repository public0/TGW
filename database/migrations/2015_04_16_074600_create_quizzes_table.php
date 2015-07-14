<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('name', '60');
			$table->text('description');

			$table->integer('score_junior')->unsigned();
			$table->integer('score_mid')->unsigned();
			$table->integer('score_senior')->unsigned();
			$table->integer('score')->unsigned()->default(0);

			$table->boolean('show_intro')->default(0);
			$table->text('intro');
			$table->integer('time')->unsigned();

			$table->timestamp('from');
			$table->timestamp('to');
			$table->timestamps();
		});

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 1,
		            'category_id' => 1,
		            'name' => 'Intern Quiz',
		            'description' => 'Intern Quiz',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 2,
		            'category_id' => 5,
		            'name' => 'PHP Quiz',
		            'description' => 'PHP Quiz',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );


		DB::table('quizzes')->insert(
		        array(
		        	'id' => 3,
		            'category_id' => 2,
		            'name' => 'MySQL',
		            'description' => 'This is a technical test for MySQL',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 68, // 4
		            'category_id' => 3,
		            'name' => 'Math Logic',
		            'description' => 'Math Thinking',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizzes')->insert(
		        array(
		        	'id' => 69, // 5
		            'category_id' => 3,
		            'name' => 'Serial numbers',
		            'description' => 'Logical series',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizzes')->insert(
		        array(
		        	'id' => 74, // 6
		            'category_id' => 2,
		            'name' => 'Java/J2EE',
		            'description' => 'Java knowledge',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 75, // 7
		            'category_id' => 2,
		            'name' => 'Tester',
		            'description' => 'Tester position',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 76, // 8 
		            'category_id' => 3,
		            'name' => 'Logical thinking',
		            'description' => 'Level of logical mind',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 175, // 9
		            'category_id' => 2,
		            'name' => 'SQL',
		            'description' => 'SQL test not only for juniors',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 178, // 10
		            'category_id' => 2,
		            'name' => 'C# developer',
		            'description' => 'C# dev basic questions',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 208, // 11
		            'category_id' => 2,
		            'name' => 'SQL',
		            'description' => 'SQL - AD PHARMA',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 219, // 12
		            'category_id' => 2,
		            'name' => 'Delphi',
		            'description' => 'Delphi',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 371, // 13
		            'category_id' => 8,
		            'name' => '.NET MVC',
		            'description' => '.NET MVC',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizzes')->insert(
		        array(
		        	'id' => 430, // 14
		            'category_id' => 9,
		            'name' => 'German level test ',
		            'description' => 'German level test for B1',
		            'show_intro' => 1,
		            'intro' => '',
		            'time' => '1200',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/**
		* Quizz to question table
		*/
		Schema::create('quizz_question', function(Blueprint $table)
		{
			$table->integer('quizz_id')->unsigned()->index();
			$table->foreign('quizz_id')->references('id')->on('quizzes')->onDelete('cascade');

			$table->integer('question_id')->unsigned()->index();
			$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

			$table->timestamps();
		});

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 2,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 3,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 4,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 5,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 6,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 7,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 8,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 9,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 1,
		            'question_id' => 10,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		/**
		* PHP Questions
		*/

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 11,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 12,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 13,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 14,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 15,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 16,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 17,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 18,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 19,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 20,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 21,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 22,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 23,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 24,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 25,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 26,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 27,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 28,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 29,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('quizz_question')->insert(
		        array(
		            'quizz_id' => 2,
		            'question_id' => 30,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/**
		* MySQL Question
		*/
		for ($i=31; $i <=47 ; $i++) { 
			DB::table('quizz_question')->insert(
			        array(
			            'quizz_id' => 3,
			            'question_id' => $i,
			            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			        )
			    );
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quizzes');
		Schema::drop('quizz_question');
	}

}
