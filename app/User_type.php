<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Type extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_types';

	public function users() {
        return $this->hasMany('App\User','id','user_type_id');
    }

}
