<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use Route;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	public $privsArray = [];
	public function __construct() {

		if (Auth::check()) {
			$loggedUser = Auth::user();
			$privs = $loggedUser->privileges;

			foreach ($privs as $priv) {
				$this->privsArray[] = $priv->id;
			}

			$defaultAllowed = [];
			/*
				Overall User privileges
			*/

/*			switch ($loggedUser->user_type_id) {
				case 1:
					break;
				case 2:
					break;
				case 3:
					break;
				case 4:
					break;
				case 5:
					break;
				case 6:
					$defaultAllowed = [
						'test',
					];
					$segments = explode('/', Route::current()->getUri());

					if (!in_array($segments[0], $defaultAllowed)) {
					}
					break;
				case 7:
					break;
				case 8:
					break;
				
			}
*/
		}
	}
}
