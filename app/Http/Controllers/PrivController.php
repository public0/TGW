<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Privileges;

class PrivController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('privileges.list');		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		if(!in_array(27, $this->privsArray))
			return redirect()->back();
		$user = User::find($id);
		$privileges = Privileges::all();
		$userPrivileges = $user->privileges->toArray();
		$userPrivilegesArray = [];
		foreach ($userPrivileges as $userPrivilege) {
			$userPrivilegesArray[] = $userPrivilege['id'];
		}
		return view('privileges.edit', compact('user', 'privileges', 'userPrivilegesArray'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();
		$user = User::find($input['user_id']);
		$user->privileges()->detach();
		$newPrivilegesArray = [];
		foreach ($input['privilege'] as $privilegeId => $privilege) {
			if($privilege) {
				$newPrivilegesArray[] = $privilegeId;
			}
		}
		$user->privileges()->attach($newPrivilegesArray);
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
