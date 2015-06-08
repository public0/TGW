<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Given_answers extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'given_answers';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['question_id', 'answer_id', 'answer', 'assignement_id'];

	public function related_answer() {
        return $this->hasOne('App\Answer', 'id', 'answer_id');
    }

}
