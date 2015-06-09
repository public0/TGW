<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Category;
use App\Quiz;
use App\User;

use Illuminate\Http\Request;
use Validator;

class AjaxController extends Controller {

	/**
	 * Display Category Listing
	 *
	 * @return Response
	 */
	public function getCategories() {
		$data = new \stdClass;
		$data->data = Category::all();
		foreach($data->data as $row) {
			$row->name = $row->name;
			$row->quizzesCount =  $row->quizzes->count();
			$row->actions = view('ajax/categories_view', compact('row'))->render();;
		}
		return response()->json($data);
	}

	/**
	 * Display Quizzes Listing
	 *
	 * @return Response
	 */
	public function getQuizzes() {
		$data = new \stdClass;
		$data->data = Quiz::all();
		foreach($data->data as $row) {
			$row->categoryName = $row->category['name'];
			if(in_array(18, $this->privsArray)) {
			$row->privileges = '
				<form method="GET" action="'.\URL::to('/').'/questions/'.$row->id.'" accept-charset="UTF-8">
					<input class="btn-sm label-info" type="submit" value="Edit">
				</form>
			';
			} else {
				$row->privileges = '';
			}
			$row->actions = view('ajax/quizzes_view', compact('row'))->render();
		}
		return response()->json($data);
	}
	/**
	* Display Users Listing
	*/
	public function getUsers() {
		$data = new \stdClass;
		$data->data = User::all();
		foreach($data->data as $row) {
			$row->uType = $row->type->type;
			$row->fullName = $row->name.' '.$row->surname;
			$row->actions = view('ajax/users_view', compact('row'))->render();
		}
		return response()->json($data);
	}
}
