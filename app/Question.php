<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = [
		'question_type_id',
		'question',
		'priority',
		'points',
		'code',
		'header_text',
		'footer_text',
	];

	public function quiz() {
		return $this->belongsToMany('App\Quiz', 'quizz_question', 'question_id', 'quizz_id')->withTimestamps();
	}

	public function question_type() {
        return $this->belongsTo('App\Question_type', 'question_type_id', 'id');
    }

	public function correctAnswers() {
        return $this->hasMany('App\Answer', 'question_id', 'id')->where('correct', 1);
    }

	public function answers() {
        return $this->hasMany('App\Answer', 'question_id', 'id');
    }

	public function given_answers() {
        return $this->hasMany('App\Given_answers', 'question_id', 'id');
    }
}
