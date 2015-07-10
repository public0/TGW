<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {

	protected $fillable = [
		'name',
		'category_id',
		'user_id',
		'description',
		'time',
		'score_junior',
		'score_mid',
		'score_senior',
		'score',
		'show_intro',
		'intro',
		'from',
		'to'
	];

	public function juniorQuestionsPoints() {
		return $this->belongsToMany('App\Question', 'quizz_question', 'quizz_id', 'question_id')->where('priority', 1)->selectRaw('SUM(points) as sum');
	}

	public function midQuestionsPoints() {
		return $this->belongsToMany('App\Question', 'quizz_question', 'quizz_id', 'question_id')->where('priority', 2)->selectRaw('SUM(points) as sum');
	}

	public function seniorQuestionsPoints() {
		return $this->belongsToMany('App\Question', 'quizz_question', 'quizz_id', 'question_id')->where('priority', 3)->selectRaw('SUM(points) as sum');
	}

	public function questionsPoints() {
		return $this->belongsToMany('App\Question', 'quizz_question', 'quizz_id', 'question_id')->selectRaw('SUM(points) as sum');
	}

	public function juniorQuestions() {
		return $this->belongsToMany('App\Question', 'quizz_question', 'quizz_id', 'question_id')->withTimestamps()->where('priority', 1);
	}

	public function midQuestions() {
		return $this->belongsToMany('App\Question', 'quizz_question', 'quizz_id', 'question_id')->withTimestamps()->where('priority', 2);
	}

	public function seniorQuestions() {
		return $this->belongsToMany('App\Question', 'quizz_question', 'quizz_id', 'question_id')->withTimestamps()->where('priority', 3);
	}

	public function questions() {
		return $this->belongsToMany('App\Question', 'quizz_question', 'quizz_id', 'question_id')->withTimestamps();
	}

	public function jobs() {
		return $this->belongsToMany('App\Job', 'job_quiz', 'quiz_id', 'job_id')->withTimestamps();
	}

	public function category() {
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}

	public function users() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
