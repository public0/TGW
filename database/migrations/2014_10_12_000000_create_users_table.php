<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('user_type_id');
			$table->integer('heramus_user_id')->default(0);
			$table->boolean('heramus_sent')->default(0);
			$table->string('name');
			$table->string('surname');
			$table->string('login');
			$table->string('phone');
			$table->string('email');
			$table->string('heramus_link')->default('');
/*			$table->string('email')->unique();*/
			$table->string('password', 60);
			$table->boolean('assigned')->default(0);
			$table->boolean('status')->default(1);
			$table->rememberToken();
			$table->timestamp('last_pass_change');
			$table->timestamps();
		});

		DB::table('users')->insert(
		        array(
		            'name' => 'admin',
		            'surname' => 'admin',
		            'login' => 'admin.admin',
		            'email' => 'alexandru.ivan@vauban.ro',
		            'user_type_id' => 1,
		            'password' => '$2y$10$7UAA4yWY4PGCAKzSn96GNexDrK/Vf7VxWahG7qsp8IO9jvDH.Odky',
		            'phone' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('users')->insert(
		        array(
		            'name' => 'Cristian',
		            'surname' => 'Toba',
		            'login' => ' cristian.toba',
		            'email' => 'cristian.toba@vauban.ro',
		            'user_type_id' => 1,
		            'password' => \Hash::make('cristian.toba'),
		            'phone' => '',
		            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		        )
		    );

		DB::table('users')->insert(
		        array(
		            'name' => 'candidate2',
		            'surname' => 'candidate2',
		            'login' => 'candidate.candidate',
		            'email' => 'candidate2.candidate2@vauban.ro',
		            'user_type_id' => 6,
		            'password' => \Hash::make('pass'),
		            'phone' => '',
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
		Schema::drop('users');
	}

}
