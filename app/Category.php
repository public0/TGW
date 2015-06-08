<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = [
		'name'
	];

	/**
	* Get Category Quizzes
	* @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function quizzes() {
		return $this->hasMany('App\Quiz', 'category_id', 'id');
	}

	/**
	* Get Category Jobs
	* @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/

	public function jobs() {
		return $this->belongsToMany('App\Job', 'category_job', 'category_id', 'job_id')->withTimestamps();
	}

}
