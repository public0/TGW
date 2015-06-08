<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('question_id')->unsigned();
			$table->text('answer');
			$table->boolean('correct')->default(1);

			$table->timestamps();
		});

		DB::table('answers')->insert(
		        array(
		            'question_id' => 1,
		            'answer' => 'Data documentului',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 1,
		            'answer' => 'Scrierea cu track changes',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 1,
		            'answer' => 'Denumirea documentului',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 1,
		            'answer' => 'Revizuire si versiunea documentului',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 2,
		            'answer' => 'Dupa aprobarea acestuia',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 2,
		            'answer' => 'Oricand doreste',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 2,
		            'answer' => 'Cand incepe sa scrie documentul',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 2,
		            'answer' => 'La prima revizuire',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 3,
		            'answer' => 'Uz Intern, Confidential, Restrictionat',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 3,
		            'answer' => 'General, Uz Intern, Confidential',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 3,
		            'answer' => 'Uz Intern, Public, Confidential',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 3,
		            'answer' => 'Public, Uz Intern, Restrictionat',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 4,
		            'answer' => 'Uz Intern',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 4,
		            'answer' => 'Confidential',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 4,
		            'answer' => 'Public',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 4,
		            'answer' => 'Restrictionat',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 5,
		            'answer' => 'Nu utilizeze Informatii Confidentiale pentru beneficiul propriu sau pentru beneficiul unei terte parti ori in alt mod ce poate produce rau companiei',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 5,
		            'answer' => 'Nu trimita emailuri nesolicitate (SPAM)',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 5,
		            'answer' => 'Se instruiasca si perfectioneze continuu',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 5,
		            'answer' => 'Nu lipseasca nemotivat',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 6,
		            'answer' => 'Protectia informatiilor',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 6,
		            'answer' => 'Managementul informatiilor',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 6,
		            'answer' => 'Confidentialitatea, integritatea si disponibilitatea informatiilor',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 6,
		            'answer' => 'Satisfactia clientilor',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 7,
		            'answer' => 'Angajatilor care le-au creat',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 7,
		            'answer' => 'Angajatorului',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 7,
		            'answer' => 'Utilizatorilor',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 7,
		            'answer' => 'Administratorului de sistem',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 8,
		            'answer' => 'Ceva normal',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 8,
		            'answer' => 'Bug',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 8,
		            'answer' => 'Atac de tip hacking',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 8,
		            'answer' => 'Eveniment de securitatea informatiilor',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 9,
		            'answer' => 'Incident de securitatea informatiilor',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 9,
		            'answer' => 'Atac de tip hacking',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 9,
		            'answer' => 'Bug',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 9,
		            'answer' => 'Ceva normal',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 10,
		            'answer' => 'Echipei de Raspuns la Incidentele de Securitate (ERIS) formata din Directorul General, Directorul IT, Directorul Administrativ',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 10,
		            'answer' => 'Echipei de Raspuns la Incidentele de Securitate (ERIS) formata din Directorul General si Directorul IT',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 10,
		            'answer' => 'Echipei de Raspuns la Incidentele de Securitate (ERIS) formata din Directorul IT, Reprezentantului conducerii pentru Sistemul de Management Integrat (RSMI), Directorul General',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 10,
		            'answer' => 'Echipei de Raspuns la Incidentele de Securitate (ERIS) formata din Directorul IT si Directorul Administrativ',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/**
		* PHP Answers
		*/
		DB::table('answers')->insert(
		        array(
		            'question_id' => 11,
		            'answer' => '1',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 11,
		            'answer' => '2',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 11,
		            'answer' => 'Notice: Undefined variable: a',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 12,
		            'answer' => 'undef',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 12,
		            'answer' => 'none',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 12,
		            'answer' => 'null',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 12,
		            'answer' => 'There is no such concept in PHP,',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 13,
		            'answer' => 'The code is perfectly fine.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 13,
		            'answer' => 'Classes can not be empty.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 13,
		            'answer' => 'Class C can not extend both A and B.',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 13,
		            'answer' => 'Qualifiers public, protected or private are missing in class definitions.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 14,
		            'answer' => 'redgreen',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 14,
		            'answer' => 'red green',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 14,
		            'answer' => '0',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 14,
		            'answer' => 'Parse Error',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 15,
		            'answer' => 'AshleyBale',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 15,
		            'answer' => 'AshleyBaleBlank',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 15,
		            'answer' => 'ShrekBlank',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 15,
		            'answer' => 'Shrek',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 16,
		            'answer' => 'a is 3 and b is 4.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 16,
		            'answer' => 'a is 4 and b is 3.',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 16,
		            'answer' => 'Both are 3.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 16,
		            'answer' => 'Both are 4.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 17,
		            'answer' => 'Duplicated keys are NOT overwritten',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 17,
		            'answer' => 'The + operator is overloaded',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 17,
		            'answer' => '$b is appended to $a',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 17,
		            'answer' => 'This produces a syntax error',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 18,
		            'answer' => 'Static methods must not return a value',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 18,
		            'answer' => 'The use of $this from within static methods is not possible.',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 18,
		            'answer' => 'Static methods need the method keyword instead of the function keyword.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 18,
		            'answer' => 'There is no static keyword in PHP.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 19,
		            'answer' => 'function 4You() { }',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 19,
		            'answer' => 'function _4You() { }',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 19,
		            'answer' => 'function object() { }',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('answers')->insert(
		        array(
		            'question_id' => 19,
		            'answer' => '$1 = "Hello";',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 19,
		            'answer' => '$_1 = "Hello World";',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 20,
		            'answer' => '50',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 20,
		            'answer' => '5',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 20,
		            'answer' => '95',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 20,
		            'answer' => '10',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 20,
		            'answer' => '100',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 21,
		            'answer' => '__get()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 21,
		            'answer' => '__set()',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 21,
		            'answer' => '__isset()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 21,
		            'answer' => '__call()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 22,
		            'answer' => 'Object Not Found',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 22,
		            'answer' => 'PHP Catchable fatal error',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 22,
		            'answer' => 'BOB (age 44)',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 22,
		            'answer' => 'BOB',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 23,
		            'answer' => 'PHP Fatal error: Class IllegalCheckout may not inherit from final class',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 23,
		            'answer' => 'Value of the bill calculated',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 23,
		            'answer' => 'PHP Fatal error: Cannot find object',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 23,
		            'answer' => 'PHP Fatal error: Cannot override final method',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 24,
		            'answer' => 'i)',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 24,
		            'answer' => 'ii)',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 24,
		            'answer' => 'iii)',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 24,
		            'answer' => 'All of the above',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 25,
		            'answer' => 'break()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 25,
		            'answer' => 'divide()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 25,
		            'answer' => 'explode()',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 25,
		            'answer' => 'md5()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 26,
		            'answer' => 'file()',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 26,
		            'answer' => 'arrfile()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 26,
		            'answer' => 'arr_file()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 26,
		            'answer' => 'file_arr()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 27,
		            'answer' => 'file_contents()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 27,
		            'answer' => 'file_get_contents()',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 27,
		            'answer' => 'file_content()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 27,
		            'answer' => 'file_get_content()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 28,
		            'answer' => 'fgets()',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 28,
		            'answer' => 'fget()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 28,
		            'answer' => 'fileget()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 28,
		            'answer' => 'filegets()',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 29,
		            'answer' => 'const',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 29,
		            'answer' => 'con',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 29,
		            'answer' => 'constant',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 29,
		            'answer' => '_constant',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 30,
		            'answer' => 'boolean',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 30,
		            'answer' => 'integer',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 30,
		            'answer' => 'string',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 30,
		            'answer' => 'all',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/**
		* MySQL Answers
		*/

		DB::table('answers')->insert(
		        array(
		            'question_id' => 32,
		            'answer' => 'Projection',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 32,
		            'answer' => 'Ordering',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 32,
		            'answer' => 'Joining',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 32,
		            'answer' => 'Grouping',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 32,
		            'answer' => 'Selection',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 34,
		            'answer' => 'WHERE',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 34,
		            'answer' => 'SELECT',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 34,
		            'answer' => 'ORDER BY',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 34,
		            'answer' => 'DISTINCT',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 35,
		            'answer' => 'SELECT',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 35,
		            'answer' => 'ALIAS',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 35,
		            'answer' => 'COLUMN',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 35,
		            'answer' => 'FROM',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 37,
		            'answer' => '5000',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 37,
		            'answer' => '0 - 4999',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 37,
		            'answer' => '2500',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 37,
		            'answer' => '5',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 38,
		            'answer' => '2',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 38,
		            'answer' => '3',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 38,
		            'answer' => '26',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 38,
		            'answer' => '-76',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );


		DB::table('answers')->insert(
		        array(
		            'question_id' => 39,
		            'answer' => '120',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 39,
		            'answer' => '123',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 39,
		            'answer' => '123.90',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 39,
		            'answer' => '124',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 41,
		            'answer' => 'No',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 41,
		            'answer' => 'Yes',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 43,
		            'answer' => 'all tables in the database',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 43,
		            'answer' => 'more than one table in the database',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 43,
		            'answer' => 'a single table in the database',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 44,
		            'answer' => 'Represent negative infinity.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 44,
		            'answer' => 'Represent 0 value.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 44,
		            'answer' => 'Represent a missing or unknown value. NULL in SQL represents nothing.',
		            'correct' => 1,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('answers')->insert(
		        array(
		            'question_id' => 44,
		            'answer' => 'Represent positive infinity.',
		            'correct' => 0,
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );



		echo "Done inserting answers.\n";
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answers');
	}

}
