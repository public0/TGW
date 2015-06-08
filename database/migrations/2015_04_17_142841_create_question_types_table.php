<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 150);			
			$table->timestamps();
		});

		DB::table('question_types')->insert(
		        array(
		            'type' => 'Multi Answer (Checkbox)',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('question_types')->insert(
		        array(
		            'type' => 'One Answer (Radio)',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('question_types')->insert(
		        array(
		            'type' => 'Free Text (Textarea)',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('question_types')->insert(
		        array(
		            'type' => 'Multi Text (Numbers only)',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions_types');
	}

}
