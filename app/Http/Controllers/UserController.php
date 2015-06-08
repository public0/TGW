<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
		if(!in_array(10, $this->privsArray))
			return redirect()->back();
		$search = $request->all();
		$users = NULL;
		if($search && !empty($search['q'])) {
			$users = User::whereRaw('name LIKE ? OR surname LIKE ? OR login LIKE ? OR email LIKE ?', ['%'.$search['q'].'%','%'.$search['q'].'%','%'.$search['q'].'%','%'.$search['q'].'%'])->paginate(10);
		} else {
			$users = User::paginate(30);
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
					$types += User_Type::orderBy('type', 'DESC')->lists('type','id');
				break;
			case 2:
					$types += User_Type::where('id', 8)->orderBy('type', 'DESC')->lists('type','id');
				break;
			case 3:
					$types += User_Type::where('id', 6)->orderBy('type', 'DESC')->lists('type','id');
				break;
			case 8:
					$types += User_Type::whereIn('id', [3, 6])->orderBy('type', 'DESC')->lists('type','id');
				break;
			
			default:
				# code...
				break;
		}
		$categories = Category::lists('name','id');
		return view('user.new_user', compact('types', 'categories'));
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

		$input['password'] = Hash::make(strtolower($input['login']));
		$newUser = User::create($input);
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
             	    } else {
						continue;
             	    }	
                 	     
                 }
				break;
			case 4: /* Tehnic */
				foreach ($privileges as $privilege) {
					if(in_array($privilege->privilege, ['Questions', 'Quizzes', 'Assignments'])) {
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
         	    } else {
					continue;
         	    }	
             	     
             }
			break;

		}
		$newUser->privileges()->attach($privilegesArray);
		if(isset($input['categories'])) {
			$newUser->categories()->attach($input['categories']);
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
					$types += User_Type::orderBy('type', 'DESC')->lists('type','id');
				break;
			case 2:
					$types += User_Type::where('id', 8)->orderBy('type', 'DESC')->lists('type','id');
				break;
			case 3:
					$types += User_Type::where('id', 6)->orderBy('type', 'DESC')->lists('type','id');
				break;
			case 8:
					$types += User_Type::whereIn('id', [8, 3, 6])->orderBy('type', 'DESC')->lists('type','id');
				break;
			
			default:
				# code...
				break;
		}
		$categories = Category::lists('name','id');
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
					if(in_array($privilege->privilege, ['Users', 'Assignements', ])) {
						$privilegesArray[] = $privilege->id;
					}
				}
				break;

			case 4: /* Tehnic */
				foreach ($privileges as $privilege) {
					if(in_array($privilege->privilege, ['Questions', 'Quizzes'])) {
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
		}
		$user->privileges()->attach($privilegesArray);
		$user->categories()->detach();
		if(isset($input['categories'])) {
			$user->categories()->attach($input['categories']);
		}

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
