<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;

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
		}
	}
}
