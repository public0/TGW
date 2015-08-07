<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\User;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
//		$schedule->command('inspire')
//				 ->hourly();

		$schedule->call(function() {
			$now = \Carbon\Carbon::now();
			$users = User::where('users.user_type_id', 6)
					 ->where('users.assigned', 0)
					 ->where('users.created_at', '<=', $now->subWeeks(2))->get();

			foreach ($users as $user) {
				if(!$user->assignements->count()) {
					$user->privileges()->detach();
					$user->categories()->detach();
					$user->delete();
				}
			}

		})/*->cron('* * * * *');*/->dailyAt('02:00');
	}

}
