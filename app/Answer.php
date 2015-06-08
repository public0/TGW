<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $fillable = [
		'question_id',
		'answer',
		'correct',
	];

	public function question() {
        return $this->belongsTo('App\Question', 'question_id', 'id');		
	}

}
