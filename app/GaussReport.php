<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GaussReport extends Model {

	protected $fillable = [
		'name',
	    'quiz_id',
		'very_bad',
		'bad',
		'medium',
		'good',
		'very_good'
	];

	/**
	* Get Job Categories
	* @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/
	public function assigned() {
		return $this->hasMany('App\User_quiz', 'quiz_id','quiz_id');		
	}
}
