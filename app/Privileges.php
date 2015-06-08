<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Privileges extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'privileges';

	/**
	* Get user with privilege
	*/
	public function users() {
		return $this->belongsToMany('App\User', 'privilege_user', 'privilege_id', 'user_id')->withTimestamps();
	}
	
}
