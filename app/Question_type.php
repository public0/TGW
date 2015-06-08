<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_type extends Model {

	public function questions() {
        return $this->hasMany('App\Question', 'question_type_id', 'id');
    }
}
