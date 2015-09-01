<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request as Req;
//use App\Http\Middleware;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Assignement;
use App\User_quiz;
use App\Given_answers;
use Auth;
use Illuminate\Http\Request;
use Storage;
use Validator;
class ApiController extends Controller {

	public function getHeramusToken($token = NULL) {
		if (Auth::user()) {
			var_dump(Auth::user());
		} else {
	    	$user = User::where('user_type_id',9)->where('email', 'careers@vauban.ro')->where('status', 1)->first();
	    	if($user) {
		    	if(Auth::attempt(['login' => $user->login, 'password' => $user->login]) ) {
					Auth::login(Auth::user(), true);
					$cookie = \Cookie::make('_token', \Session::get('_token'));
					var_dump(\Session::all());

//				  var_dump(Auth::user());
				}
	    	}
		}
		die();

    	if($user) {
    		/*
				Aici logarea ar trebui sa fie pe baza unui token, in cazul in care se va extinde astfel incat mai multe servere sa faca request la TGW.
				Serverele ne trimit login, password in get criptate intr-un token care ni-l trimit noua sa-l logam
    		*/
#			if(!$token) {
		    	if(Auth::attempt(['login' => $user->login, 'password' => $user->login]) ) {
				  Auth::login(Auth::user(), true);
				}
				\Session::put('_token21', 1);
				var_dump(\Session::all());
				return \Session::getId();
//		   	return response()->json(['_token' => csrf_token()]);
#			} else {
				var_dump(\Session::all());
				echo '<br>';
				//echo \Session::getId().'<br>';
				return $token;
//			   	return response()->json(['_token' => csrf_token()]);

#			}
	   	} else {
//			return NULL;
	   		return response()->json(NULL);
	   	}

	}

    public function getToken(){
/*    	$user = User::where('user_type_id',9)->first();
    	$connected = FALSE;
    	if(Auth::attempt(['login' => $user->login, 'password' => $user->login]) && Auth::user()->status != 0) {
		  Auth::login(Auth::user(), true);
		  $connected = TRUE;
		}
*/
		return csrf_token();
//    	return response()->json(['token' => csrf_token()]);
    }

	public function getQuizResults(){

        $data = new \stdClass;
     	$data = \DB::table('users')
               ->join('user_quiz','users.id','=','user_quiz.user_id')
               ->leftjoin('quizzes','user_quiz.quiz_id','=','quizzes.id')
               ->leftJoin('assignements','users.id','=','assignements.assigned_user')
               ->leftJoin('jobs','assignements.assigned_job','=','jobs.id')
               ->select(
	               	'quizzes.name as quiz_name',
	               	'users.heramus_user_id as user_id',
	               	'user_quiz.mark as final_note',
	               	'jobs.title as job_name',
	               	'quizzes.score as quiz_score'
               	)
               ->where('user_quiz.final', 1)
               ->where('users.user_type_id',6)
               ->where('user_quiz.heramus_sent',0)
               ->get();

		
			if($data){
/*				foreach($data as $value) {
				}
*/				return response()->json($data);	
			}
				return response()->json(NULL);	
     
	}

	public function storeCandidate(Req $request){
	    $input = $request->all();
    	$user = User::where('user_type_id',9)->where('email', 'careers@vauban.ro')->where('status', 1)->first();

    	if($user) {
			if(Auth::attempt(['login' => $user->login, 'password' => $user->login]) ) {
			  Auth::login(Auth::user(), true);
			}
	   	} else {
			return response()->json('Error logging in!');		   		
	   	}

/*	    $this->validate($request, [
		        'name' => 'required|max:255',
		        'surname' => 'required|max:255',
		        'email' => 'required|email|max:255',
		        'phone' => 'numeric|digits_between:10,11'
		        
		]);
*/	
	    $login = strtolower($input['name'].'.'.$input['surname']);
		$user = [
			'user_type_id' => 6,
			'name' => $input['name'],
			'surname' => $input['surname'],
			'login' => $login,
			'heramus_user_id' => $input['heramus_user_id'],
			'phone' => isset($input['phone'])?$input['phone']:'',
			'email' => $input['email'],
			'heramus_link' => $input['heramus_link'],
			'password' => \Hash::make($login),
		];
		try {
			if(User::create($user)){
                 return response()->json('Candidate was inserted successfully.');
			}		
		} catch (Exception $e) {
			$message = $e->getMessage();
			return response()->json($message);	
		}
	}
}


