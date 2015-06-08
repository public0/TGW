<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 150);
			$table->timestamps();
		});

		DB::table('user_types')->insert(
		        array(
		            'id' => '1',
		            'type' => 'Admin',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('user_types')->insert(
		        array(
		            'id' => '2',
		            'type' => 'HR Manager',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('user_types')->insert(
		        array(
		            'id' => '3',
		            'type' => 'HR Officer',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('user_types')->insert(
		        array(
		            'id' => '4',
		            'type' => 'Tehnic',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('user_types')->insert(
		        array(
		            'id' => '5',
		            'type' => 'Employees',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('user_types')->insert(
		        array(
		            'id' => '6',
		            'type' => 'Candidate',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		/**
		* Additional Users
		*/
		DB::table('user_types')->insert(
		        array(
		            'id' => '7',
		            'type' => 'CEO',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('user_types')->insert(
		        array(
		            'id' => '8',
		            'type' => 'HR Team Leader',
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
		Schema::drop('user_types');
	}

}
