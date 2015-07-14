<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {

	protected $fillable = [
		'title',
		'user_id',
		'candidates',
		'description',
		'status',
		'notified',
		'start_at',
		'end_at'
	];

	/**
	* Get Job Categories
	* @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function quizzes() {
		return $this->belongsToMany('App\Quiz', 'job_quiz', 'job_id', 'quiz_id')->withTimestamps();
	}

	public function officers() {
		return $this->belongsToMany('App\User', 'job_officer', 'job_id', 'user_id')->withTimestamps();
	}

	public function assigned() {
		return $this->hasMany('App\Assignement', 'assigned_job', 'id');
	}
}
