<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	protected $types = ['c','r','u','d' ];

	public function up()
	{
		Schema::create('privileges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('privilege', 50);
			$table->char('type', 1);
			$table->timestamps();
		});

		/**
		* Users Privileges pivot table
		*/
		Schema::create('privilege_user', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('privilege_id')->unsigned()->index();
			$table->foreign('privilege_id')->references('id')->on('privileges')->onDelete('cascade');
			$table->timestamps();
		});

		/**
		* Categories privilege
		*/
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Categories',
		            'type' => $this->types[0],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Categories',
		            'type' => $this->types[1],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Categories',
		            'type' => $this->types[2],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Categories',
		            'type' => $this->types[3],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );


		/**
		* Quizzes privilege
		*/
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Quizzes',
		            'type' => $this->types[0],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Quizzes',
		            'type' => $this->types[1],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Quizzes',
		            'type' => $this->types[2],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Quizzes',
		            'type' => $this->types[3],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		/**
		* Users privilege
		*/
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Users',
		            'type' => $this->types[0],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Users',
		            'type' => $this->types[1],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Users',
		            'type' => $this->types[2],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Users',
		            'type' => $this->types[3],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		/**
		* Assignements privilege
		*/
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Assignments',
		            'type' => $this->types[0],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Assignments',
		            'type' => $this->types[1],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Assignments',
		            'type' => $this->types[2],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Assignments',
		            'type' => $this->types[3],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		/**
		* Questions privilege
		*/
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Questions',
		            'type' => $this->types[0],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Questions',
		            'type' => $this->types[1],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Questions',
		            'type' => $this->types[2],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Questions',
		            'type' => $this->types[3],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		/**
		* Jobs privilege
		*/
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Jobs',
		            'type' => $this->types[0],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Jobs',
		            'type' => $this->types[1],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Jobs',
		            'type' => $this->types[2],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Jobs',
		            'type' => $this->types[3],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );


		/**
		* Privileges privilege
		*/
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Privileges',
		            'type' => $this->types[0],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Privileges',
		            'type' => $this->types[1],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Privileges',
		            'type' => $this->types[2],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Privileges',
		            'type' => $this->types[3],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		
				/**
		* Reports privilege
		*/
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Reports',
		            'type' => $this->types[0],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Reports',
		            'type' => $this->types[1],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Reports',
		            'type' => $this->types[2],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		DB::table('privileges')->insert(
		        array(
		            'privilege' => 'Reports',
		            'type' => $this->types[3],
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );
		echo "Done inserting Privileges.\n";
		$count = DB::table('privileges')->count();

		for ($i=1; $i <= $count; $i++) { 
			DB::table('privilege_user')->insert(
			        array(
			            'user_id' => 1,
			            'privilege_id' => $i,
			            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			        )
			    );
			DB::table('privilege_user')->insert(
			        array(
			            'user_id' => 2,
			            'privilege_id' => $i,
			            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
			        )
			    );
	
	
		}
		echo "Done inserting admins.\n";

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('priveleges');
		Schema::drop('users_privileges');
	}

}
