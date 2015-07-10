<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_type_id', 'name', 'surname', 'login', 'email', 'password', 'assigned', 'phone', 'heramus_link'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function type() {
        return $this->belongsTo('App\User_type', 'user_type_id', 'id');
    }

	public function assignements() {
        return $this->hasMany('App\User_quiz', 'user_id', 'id');
    }

	/**
	* Get user privileges
	*/
	public function privileges() {
		return $this->belongsToMany('App\Privileges', 'privilege_user', 'user_id', 'privilege_id')->withTimestamps();
	}
	/**
	* Get user categories
	*/
	public function categories() {
		return $this->belongsToMany('App\Category', 'category_user', 'user_id', 'category_id')->withTimestamps();
	}

	/**
	* Get Officer Jobs
	*/
	public function jobs() {
		return $this->belongsToMany('App\Job', 'job_officer', 'user_id', 'job_id')->withTimestamps();
	}
	/*
	* assigned candidates
	*/
	public function assignedJobs() {
        return $this->hasMany('App\Assignement', 'assigned_user', 'id');
    }
}
