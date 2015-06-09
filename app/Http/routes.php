<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('auth/login', 'LoginController@login');
Route::post('auth/login', 'LoginController@postLogin');

//Route::get('home', 'LoginController@index');
/*
|--------------------------------------------------
| Users need to be Authenticated to view these routes
|--------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function() {
	Route::get('auth/reset', 'LoginController@resetPassword');
	Route::post('auth/reset', 'LoginController@postResetPassword');

	Route::get('categories', 'CategoryController@index');
	Route::get('categories/create', 'CategoryController@create');
	Route::put('categories/store', 'CategoryController@store');
	Route::get('categories/edit/{id}', 'CategoryController@edit');
	Route::post('categories/update/{id}', 'CategoryController@update');
	Route::delete('categories/delete/{id}', 'CategoryController@destroy');
	Route::get('categories/delete/{id}', 'CategoryController@destroy');

	Route::get('quizzes', 'QuizController@index');
	Route::get('quizzes/create', 'QuizController@create');
	Route::get('quizz/edit/{id}', 'QuizController@edit');
	Route::post('quizz/update/{id}', 'QuizController@update');
	Route::delete('quizz/delete/{id}', 'QuizController@destroy');
	Route::put('quizz/store', 'QuizController@store');

	Route::get('users', 'UserController@index');
	Route::get('user/create', 'UserController@create');
	Route::put('user/store', 'UserController@store');
	Route::get('user/edit/{id}', 'UserController@edit');
	Route::post('user/update/{id}', 'UserController@update');
	Route::delete('user/delete/{id}', 'UserController@destroy');

	Route::get('jobs_assignements', 'AssignementController@jobs_assignements');
	Route::get('user_assignements', 'AssignementController@user_assignements');
	Route::get('quiz_assignments/{aid}/{qid}', 'AssignementController@quiz_assignements');
	Route::get('quiz_assignments', 'AssignementController@quiz_assignements');
	Route::get('assignements', 'AssignementController@index');
	Route::get('new_assignement', 'AssignementController@create');
	Route::delete('assignment/delete/{aid}/{qid}', 'AssignementController@destroy');


	Route::get('questions', 'QuestionController@index');
	Route::get('question/create', 'QuestionController@create');
	Route::get('question/create/{id}', 'QuestionController@quiz_create');
	Route::put('question/store/{id}', 'QuestionController@quiz_store');
	Route::put('question/store', 'QuestionController@store');
	Route::delete('question/delete/{id}', 'QuestionController@destroy');
	Route::get('question/edit/{id}', 'QuestionController@edit');
	Route::post('question/update/{id}', 'QuestionController@update');
	Route::get('questions/{id}', 'QuizController@quizz_questions');
	Route::get('questions/show_questions/{id}', 'QuizController@show_questions');

	Route::get('jobs','JobController@index');
	Route::get('job/create','JobController@create');
	Route::put('job/store','JobController@store');
	Route::get('job/edit/{id}','JobController@edit');
	Route::post('job/update/{id}','JobController@update');
	Route::delete('job/delete/{id}','JobController@destroy');

	Route::get('assignements','AssignementController@index');
	Route::get('assignement/create','AssignementController@create');
	Route::put('assignement/store','AssignementController@store');
	Route::get('assignement/edit/{id}','AssignementController@edit');
	Route::post('assignement/update/{id}','AssignementController@update');
	Route::delete('assignement/delete/{id}','AssignementController@destroy');

	Route::get('test/','TestController@take');
	Route::get('test/score','TestController@score');
	Route::put('test/submit','TestController@submit');
	Route::get('results/{uid}/{aid}/{qid}', 'TestController@result');
	Route::post('results/{uid}/{aid}/{qid}', 'TestController@result');
	Route::post('test/save_points', 'TestController@save_points');
	Route::get('test/save_points', 'TestController@save_points');
	Route::get('test/continue', 'TestController@goToTest');

	Route::resource('privileges', 'PrivController');

	Route::get('ajax/get_categories', 'AjaxController@getCategories');
	Route::get('ajax/get_quizzes', 'AjaxController@getQuizzes');
	Route::get('ajax/get_users', 'AjaxController@getUsers');

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);