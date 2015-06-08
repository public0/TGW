<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use App\Category;

use Illuminate\Http\Request as Req;
use Validator;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!in_array(2, $this->privsArray))
			return redirect()->back();
/*		$categories = Category::paginate(10);*/
		$categories = Category::get();

		return view('categories.categories', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!in_array(1, $this->privsArray))
			return redirect()->back();
		return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Req $request)
	{
		$this->validate($request, [
		        'name' => 'required'
		]);

		$input = Request::all();

		$newCategory = Category::create($input);
		return redirect('categories');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('categories.categories');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!in_array(3, $this->privsArray))
			return redirect()->back();
		$category = Category::find($id);
		return view('categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Request::all();
		$category = Category::find($id);
		$category->name = $input['name'];
		$category->save();
		return redirect('categories');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(!in_array(4, $this->privsArray))
			return redirect()->back();
		$category = Category::find($id);
		$category->delete();
		return redirect('categories');
	}

}
