<?php namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use App\User_type;
use App\Job;
use App\Assignement;
use App\User_quiz;

//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
//use Request;
use Illuminate\Http\Request;

class LoginController extends Controller {

    const LDAP_HOST = 'DCHQ.hub.vauban.ro';
    /**
     * Show login form.
     *
     * @return Response
     */
    public function login() {
		return view('auth/login', compact('questions'));
    }

    public function postLogin(Request $request) {
        /**
        * Login Logic
        * If user in local DB he connects with login/pass
        * If user not found in local DB we search in active records 
        * If we find a user with the sAMAccountName == to the login input we query for his AD email
        * If there is already a user with that email in the local db we try to log him in with email/pass credentials and use that account 
        * If a user with the email/pass matches a user that has an admin (for example) account then he connects to this account using his AD credentials
        * If there isn't a user with the email found in the local DB than a new user is created with the email taken from AD and the same password from AD
        */
        $user = NULL;
		$input = $request->all();
		if (Auth::attempt(['login' => $input['login'], 'password' => $input['password']])) {
			Auth::login(Auth::user(), true);
			if ($input['password'] == $input['login'] && Auth::user()->user_type_id != 6) {
				return redirect('auth/reset');
			} 
            if(Auth::user()->user_type_id == 6 /*|| Auth::user()->user_type_id == 5*/) {
                return redirect('test');
            }
            //return redirect()->intended('/');
        } else {
            $ad_emails = [];
            $conn;
            $ldap_conn = ldap_connect(self::LDAP_HOST);
            $dn[] = 'DC=hub,DC=vauban,DC=ro';
            $dnCount = count($dn);
            for($x=0; $x < $dnCount; $x++){
                $conn[] = $ldap_conn;
            }
            $user = 'HUB\\'.$input['login'];

            $authenticated = @ldap_bind($ldap_conn,$user,$input['password']);
            if($authenticated) {
                $search_filter = '(&(ObjectCategory=person)(memberof=CN=pontaj,DC=hub,DC=vauban,DC=ro)(sAMAccountName='.$input['login'].'))';
                $sr = ldap_search($conn, $dn, $search_filter);
                if(!empty($sr)){
                    foreach($sr as $k=>$v){
                        $info = ldap_get_entries($ldap_conn, $v);
                        for ($i=0; $i<$info["count"]; $i++) {
                            if(!empty($info[$i]["mail"][0])){
                                array_push($ad_emails, strtolower($info[$i]["mail"][0]));
                            }
                        }
                    }                   
                }
                $userExists = User::where('email', $input['login'].'@vauban.ro')->where('user_type_id', 5)->get()->toArray();

                if (!empty($userExists)) {
                    if (Auth::attempt(['email' => $ad_emails[0], 'password' => $input['password'], 'user_type_id' => 5])) {
                        Auth::login(Auth::user(), true);
                        /*check for current date and compare to intern quizz from and to*/
/*
                        $assignement = Assignement::where('assigned_user', Auth::user()->id)->where('status', 1)->where()->first();
                        if(is_null($assignement)) {
                            return redirect('test/score');
                        }
*/
                    }
                } else {
                    $userData = [
                        'user_type_id' => 5,
                        'login' => $input['login'],
                        'email' => isset($ad_emails[0])?$ad_emails[0]:$input['login'].'@vauban.ro',
                        'password' => Hash::make($input['password'])
                    ];
                    $newUser = User::create($userData);
                    if (Auth::attempt(['login' => $input['login'], 'password' => $input['password'], 'user_type_id' => 5])) {
                        Auth::login(Auth::user(), true);
                    }
                }
                /**
                * User has authenticated through ldap
                */

            } else {
                return redirect()->back()->withInput()->withErrors(['wrong_credentials']);
            }

        }	
        /**
        * User authenticated through ldap or not
        */
        $user = Auth::user();
        $newAssignement = NULL;
        if($user->user_type_id == 5) {
            $toTest = FALSE;
            $job = Job::find(1);
            $quizzes = $job->quizzes->toArray();

            foreach ($quizzes as $quiz) {
                if(($quiz['from'] < \Carbon\Carbon::now()->toDateTimeString()) && $quiz['to'] > \Carbon\Carbon::now()->toDateTimeString()) {
                    $user_quiz = User_quiz::where('user_id', $user->id)
                    ->where('quiz_id', $quiz['id'])->first();
//                    ->where('done', 1)->first();
                    if(!$user_quiz) {
                        $toTest = TRUE;
                    }
                    /**
                    * Assign this quiz to user
                    */
                }
            }
            if($toTest) {
            $assignementData = [
                'assigned_job'  => 1,
                'assigned_user' => $user->id,
            ];

            $newAssignement = Assignement::create($assignementData);
            $user->assigned = 1;
            $user->save();

                foreach ($quizzes as $quiz) {
                    if(($quiz['from'] < \Carbon\Carbon::now()->toDateTimeString()) && $quiz['to'] > \Carbon\Carbon::now()->toDateTimeString()) {
                        /**
                        * Assign this quiz to user
                        */
                        $toTest = TRUE;
                        $userQuizData = [
                            'user_id' => $user->id,
                            'quiz_id' => $quiz['id'],
                            'assignement_id' => $newAssignement->id,
                            'mark' => 0,
                            'done' => 0
                        ];
                        $userQuiz = User_quiz::create($userQuizData);


                    }
                }

                return redirect('test');
            } else {
                return redirect()->intended('/');
            }

        } else {
            return redirect()->intended('/');
        }
    }

    public function resetPassword() {
		return view('auth/newpass');
    }

    public function postResetPassword(Request $request) {
			$this->validate($request, [
			        'password' => 'required|max:25|same:confirm_password',
			        'confirm_password' => 'required|max:25',
			]);
			Auth::user()->password = Hash::make($request->password);
			Auth::user()->save();
            if(Auth::user()->user_type_id == 5) {
                return redirect('test');
            }

            return redirect('/');
    }
}
