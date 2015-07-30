<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->integer('candidates')->unsigned();
			$table->text('notified');
			$table->text('description');
			$table->boolean('status');
			$table->timestamp('start_at');
			$table->timestamp('end_at');			
			$table->timestamps();
		});

		DB::table('jobs')->insert(
		        array(
		            'title' => 'Intern',
		            'candidates' => '0',
		            'description' => '',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 2,
		            'title' => 'EAI CONTROL M',
		            'candidates' => '4',
		            'description' => 'Profil EAI (J2EE applications servers (WAS or WBL or JBOSS)) engineering + Control M automation',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 3,
		            'title' => 'Java dev',
		            'candidates' => '20',
		            'description' => 'Java developer',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 4,
		            'title' => 'C#.NET developer',
		            'candidates' => '0',
		            'description' => 'C#.NET developer',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 5,
		            'title' => 'Sales',
		            'candidates' => '10',
		            'description' => ': 	 Mini 3 years experience in sales or management of project (complex) Profile: ASE or UPB, technical or economic Preference for a woman 28-35 years old positive attitude, to do things, volunteer, energic organized and capacity to follow a lead until its resolution excellent communication skills capacity of negociation',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 6,
		            'title' => 'Recruitment',
		            'candidates' => '0',
		            'description' => 'Define Job Description for different profiles;  CV screening and selection ; finding the best sourcing channels;  Post the announcements for every vacant position on different sources;  Contacting the candidates, validate and scheduling for meetings;  Keep in touch with the candidates during the entire recruitment process;  Send letters to inform candidates of their acceptance or rejection of employment.',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 7,
		            'title' => 'BI',
		            'candidates' => '0',
		            'description' => 'analist BI',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 8,
		            'title' => 'SQL',
		            'candidates' => '20',
		            'description' => 'SQL all levels',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 9,
		            'title' => 'C# developer',
		            'candidates' => '20',
		            'description' => 'C# Programming Basic questions',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 10,
		            'title' => 'SQL AD PHARMA',
		            'candidates' => '20',
		            'description' => 'SQL test for AD PHARMA ',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 11,
		            'title' => 'Delphi AD PHARMA',
		            'candidates' => '0',
		            'description' => 'Delphi AD PHARMA ',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 12,
		            'title' => 'PHP',
		            'candidates' => '20',
		            'description' => 'php dev ',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 13,
		            'title' => 'ASP.NET',
		            'candidates' => '20',
		            'description' => '.NET MVC',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('jobs')->insert(
		        array(
		        	'id' => 14,
		            'title' => 'German level test',
		            'candidates' => '20',
		            'description' => 'German test',
		            'status' => '1',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/**
		* Job Quiz
		*/
		Schema::create('job_quiz', function(Blueprint $table) {
			$table->integer('quiz_id')->unsigned()->index();
			$table->foreign('quiz_id')->references('id')->on('quizzes')->onUpdate('cascade')->onDelete('cascade');

			$table->integer('job_id')->unsigned()->index();
			$table->foreign('job_id')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');

			$table->timestamps();
		});

		DB::table('job_quiz')->insert(
		        array(
		        	'quiz_id' => 1,
		        	'job_id' => 1,

		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('job_quiz')->insert(
		        array(
		        	'quiz_id' => 2,
		        	'job_id' => 12,

		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('job_quiz')->insert(
		        array(
		        	'quiz_id' => 3,
		        	'job_id' => 12,

		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		/**
		* Job Users
		*/

		Schema::create('job_officer', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('job_id');
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
		Schema::drop('jobs');
		Schema::drop('job_quiz');
/*		Schema::drop('category_job');
*/	}

}
