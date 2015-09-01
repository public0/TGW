<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
//use Request;
use Hash;
use Validator;

use App\User;
use App\Category;
use App\User_type;
use App\Privileges;
use Auth;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if(!in_array(10, $this->privsArray)) {			
			return redirect()->back();
		}
		return view('user.show_users', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!in_array(9, $this->privsArray))
			return redirect()->back();
		$types = [ 0 => \Lang::get('messages.select')];

		switch (Auth::user()->user_type_id) {
			case 1:
					$types += User_Type::orderBy('type', 'DESC')->where('id', '!=', 5)->lists('type','id');
				break;
			case 2:
					$types += User_Type::whereIn('id', [3, 6, 8])->where('id', '!=', 5)->orderBy('type', 'DESC')->lists('type','id');
				break;
			case 3:
					$types += User_Type::where('id', 6)->where('id', '!=', 5)->orderBy('type', 'DESC')->lists('type','id');
				break;
			case 8:
					$types += User_Type::whereIn('id', [3, 6])->where('id', '!=', 5)->orderBy('type', 'DESC')->lists('type','id');
				break;
			
			default:
				# code...
				break;
		}
		// $categories = Category::lists('name','id');
		// return view('user.new_user', compact('types', 'categories'));

		$categories = Category::lists('name','id');
		$uUnCat = [];
		$uUnCat = DB::table('category_user')
					->distinct()
                    ->lists('category_id');
		foreach ($uUnCat as $value) {
			unset($categories[$value]);
		}

		return view('user.new_user', compact('types', 'categories', 'uUnCat'));


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$privileges = Privileges::all();
		$privilegesArray = [];

		$this->validate($request, [
		        'name' => 'required|max:255',
		        'surname' => 'required|max:255',
/*		        'email' => 'required|email|unique:users|max:255',*/
		        'email' => 'required|email|max:255',
		        'user_type_id' => 'required|exists:user_types,id',			
		        'phone' => 'numeric|digits_between:10,11',
		        'login' => 'required|unique:users'
		]);
		$input = $request->all();

//		$input['login'] = strtolower($input['name'].'.'.$input['surname']);
		$input['login'] = strtolower($input['login']);
        $input['status'] = 1;
		$input['password'] = Hash::make(strtolower($input['login']));
		// last_pass_change
		$input['last_pass_change'] = \Carbon\Carbon::now()->toDateTimeString();
		// last_pass_change
		$newUser = User::create($input);
		switch ($input['user_type_id']) {
			case 1: /* Admin */
				foreach ($privileges as $privilege) {
					$privilegesArray[] = $privilege->id;
				}
				break;
			case 2: /* HR Manager*/
				foreach ($privileges as $privilege) {
                 	if(in_array($privilege->privilege,['Users']) && $privilege->type !='u' && $privilege->type !='d'){
                       $privilegesArray[] = $privilege->id;

					} elseif (in_array($privilege->privilege, ['Assignments', 'Jobs'])) {
						$privilegesArray[] = $privilege->id;
             	    } elseif (in_array($privilege->privilege,['Categories'])){
                        $privilegesArray[] = $privilege->id;
             	    }
				}
				break;
			case 3: /* HR Officer */
                 foreach ($privileges as $privilege){
                 	if(in_array($privilege->privilege,['Users']) && $privilege->type !='u' && $privilege->type !='d'){
                       $privilegesArray[] = $privilege->id;
//                 	} elseif(in_array($privilege->privilege,['Jobs']) && $privilege->type != 'u'){
//                       $privilegesArray[] = $privilege->id;
                 	} elseif (in_array($privilege->privilege,['Assignments']) &&  $privilege->type !='u'){
                        $privilegesArray[] = $privilege->id;
             	    }
                 }
				break;
			case 4: /* Tehnic */
				foreach ($privileges as $privilege) {
					if(in_array($privilege->privilege, ['Questions', 'Quizzes'])) {
						$privilegesArray[] = $privilege->id;
					} elseif(in_array($privilege->privilege,['Assignments'])  && $privilege->type == 'r') {
						$privilegesArray[] = $privilege->id;
					}
				}
				break;
			case 4: /* Intern */
				# code...
				break;
			case 5: /* Candidate */
				# code...
				break;
			case 7: /* Candidate */
				foreach ($privileges as $privilege) {
					$privilegesArray[] = $privilege->id;
				}
				break;
			case 8: /* HR TEAM LEADER */
             foreach ($privileges as $privilege){
             	if(in_array($privilege->privilege,['Users']) && $privilege->type !='u' && $privilege->type !='d'){
                   $privilegesArray[] = $privilege->id;
             	} elseif(in_array($privilege->privilege,['Jobs'])){
                   $privilegesArray[] = $privilege->id;
             	} elseif (in_array($privilege->privilege,['Assignments']) &&  $privilege->type !='u'){
                    $privilegesArray[] = $privilege->id;
         	    } elseif (in_array($privilege->privilege,['Categories'])){
                    $privilegesArray[] = $privilege->id;
         	    }
             }
			break;

		}
		$newUser->privileges()->attach($privilegesArray);
		if(isset($input['categories'])) {
			$newUser->categories()->attach($input['categories']);
		}

		if($input['user_type_id'] != 6){
            $userEmail = ['userEmail'=>$input['email']];
            \Mail::send('emails.new_user', compact('newUser', 'userEmail'), function($message) use ($newUser, $userEmail)
            {
                $message->to($userEmail['userEmail'])->subject(\Lang::get('messages.new_user'));
            });
        }
		return redirect('users');		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!in_array(11, $this->privsArray))
			return redirect()->back();
		$user = User::find($id);
		$userCategories = $user->categories;
		$uCat = [];
		foreach ($userCategories as $userCategory) {
			$uCat[] = $userCategory->id;
		}
#		$types = User_Type::lists('type','id');
		$types = [ 0 => \Lang::get('messages.select')];
		switch (Auth::user()->user_type_id) {
			case 1:
					   $types += User_Type::orderBy('type', 'DESC')->where('id', '!=', 5)->lists('type','id');
                break;
            case 2:
                    if($user->user_type_id == 6){
                        $types += User_Type::where('id', 6)->where('id', '!=', 5)->orderBy('type', 'DESC')->lists('type','id');}
                    else{
                        $types += User_Type::whereIn('id', [3,8])->where('id', '!=', 5)->orderBy('type', 'DESC')->lists('type','id');
                    }
                break;
            case 3: 
 
                        $types += User_Type::where('id', 6)->where('id', '!=', 5)->orderBy('type', 'DESC')->lists('type','id');
                break;
            case 8:
                    if($user->user_type_id == 6){
                        $types += User_Type::where('id', 6)->where('id', '!=', 5)->orderBy('type', 'DESC')->lists('type','id');}
                    else{
                        $types += User_Type::where('id', 3)->where('id', '!=', 5)->orderBy('type', 'DESC')->lists('type','id');
                    }
 
                break;
			
			default:
				# code...
				break;
		}
		// $categories = Category::lists('name','id');
		// return view('user.edit_user', compact('user','types', 'categories', 'uCat'));

		$categories = Category::lists('name','id');
		$uUnCat = [];
		$uUnCat = DB::table('category_user')
					->distinct()
                    ->where('user_id', '<>', $id)
                    ->lists('category_id');
		foreach ($uUnCat as $value) {
			unset($categories[$value]);
		}
		return view('user.edit_user', compact('user','types', 'categories', 'uCat'));



	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{

		$privileges = Privileges::all();
		$privilegesArray = [];
		$this->validate($request, [
		        'name' => 'required|max:255',
		        'surname' => 'required|max:255',
		        'email' => 'required|email|max:255',
		        'user_type_id' => 'required|exists:user_types,id',			
		        'phone' => 'numeric|digits_between:10,11'
		]);

		$input = $request->all();
		$input['login'] = strtolower($input['login']);
		$user = User::find($id);
		if(strcmp($user->login, $input['login']) !== 0) {
			$this->validate($request, [
		        'login' => 'required|unique:users',
			]);

		}
		$user->user_type_id = $input['user_type_id'];
		$user->name = $input['name'];
		$user->surname = $input['surname'];
		$user->login = $input['login'];

		#$pass = $input['password'];
		#$passConf = $input['password_confirmation'];
		
		$user->email = $input['email'];
		$user->phone = $input['phone'];
		$user->heramus_link = $input['heramus_link'];
		$user->save();
		$user->privileges()->detach();
		switch ($input['user_type_id']) {
		case 1: /* Admin */
				foreach ($privileges as $privilege) {
					$privilegesArray[] = $privilege->id;
				}
				break;
			case 2: /* HR */
				foreach ($privileges as $privilege) {
					if(in_array($privilege->privilege, ['Users', 'Assignments' ])) {
						$privilegesArray[] = $privilege->id;
					}
				}
				break;
			case 3: /* HR Officer */
                 foreach ($privileges as $privilege){
                 	if(in_array($privilege->privilege,['Users']) && $privilege->type !='u' && $privilege->type !='d'){
                       $privilegesArray[] = $privilege->id;
                 	} elseif (in_array($privilege->privilege,['Assignments']) &&  $privilege->type !='u'){
                        $privilegesArray[] = $privilege->id;
             	    }
                 }
				break;
			case 4: /* Tehnic */
				foreach ($privileges as $privilege) {
					if(in_array($privilege->privilege, ['Questions', 'Quizzes'])) {
						$privilegesArray[] = $privilege->id;
					} elseif(in_array($privilege->privilege,['Assignments']) &&  $privilege->type =='r') {
						$privilegesArray[] = $privilege->id;
					}
				}
				break;
			case 4: /* Intern */
				# code...
				break;
			case 5: /* Candidate */
				# code...
				break;
			case 7: /* Candidate */
				foreach ($privileges as $privilege) {
					$privilegesArray[] = $privilege->id;
				}
				break;
			case 8: /* HR TEAM LEADER */
             foreach ($privileges as $privilege){
             	if(in_array($privilege->privilege,['Users']) && $privilege->type !='u' && $privilege->type !='d'){
                   $privilegesArray[] = $privilege->id;
             	} elseif (in_array($privilege->privilege,['Assignments']) &&  $privilege->type !='u'){
                    $privilegesArray[] = $privilege->id;
         	    }             	     
             }
			break;
		}
		$user->privileges()->attach($privilegesArray);
		$user->categories()->detach();
		if(isset($input['categories'])) {
			$user->categories()->attach($input['categories']);
		}

		return redirect('users');		
	}

/**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function statusUser($id, $stat)
    {
        
 
        $user = User::find($id);
        $user->status = $stat;
        $user->save();
        
 
        return redirect('users');       
    }
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(!in_array(12, $this->privsArray))
			return redirect()->back();
		$user = User::find($id);
		$user->privileges()->detach();
		$user->categories()->detach();
		$user->delete();
		return redirect('users');
	}

}
