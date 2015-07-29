<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_quiz extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_quiz';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'quiz_id', 'assignement_id', 'mark', 'done', 'final', 'reason'];

	public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

	public function quiz() {
        return $this->hasOne('App\Quiz', 'id', 'quiz_id');
    }

	public function assignement() {
        return $this->hasOne('App\Assignement', 'id', 'assignement_id');
    }

}
