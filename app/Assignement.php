<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignement extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'assignements';

	protected $fillable = [
		'assigned_job',
		'assigned_user',
		'started_at',
		'ended_at',
		'status'
	];

	public function job() {
        return $this->hasOne('App\Job', 'id', 'assigned_job');
    }

	public function user() {
        return $this->hasOne('App\User', 'id', 'assigned_user');
    }

	public function users() {
        return $this->hasMany('App\User', 'id', 'assigned_user');
    }

	public function quizzes() {
        return $this->hasMany('App\User_quiz', 'assignement_id', 'id');
    }
}
