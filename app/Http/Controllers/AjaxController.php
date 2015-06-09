<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Category;
use App\Quiz;
use App\User;
use App\Assignement;
use App\Job;
use Auth;

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

	/**
	* Display Assignments Listing
	*
	* @return Response
	*/
	public function getAssignments() {
		$data = new \stdClass;
		$user = Auth::user();
		$userCategories = $user->categories;
		$uCat = [];
		foreach ($userCategories as $userCategory) {
			$uCat[] = $userCategory->id;
		}

		$data->data = Assignement::with(['job' => function($query) {

		}])->orderBy('id', 'DESC')->groupBy('assigned_job')->get();
		foreach($data->data as $key => $row) {
			$officersArr = [];
			$row->show = TRUE;
			if(empty($row->quizzes->toArray()) && $user->user_type_id == 4 && !empty($uCat)) {
				$row->show = FALSE;
			}
	    	foreach($row->quizzes as $quiz) {
	    		if($user->user_type_id == 4 && !empty($uCat)) {
	    			if(in_array($quiz->quiz->category->id, $uCat)) {
	    				$row->show = TRUE;
	    				break;
	    			} else {
	    				$row->show = FALSE;
	    			}
	    		} else {
		    		$row->show = TRUE;
	    		}
	    	}
			if(in_array($user->user_type_id, [3, 8])) {
				if($row->job->officers) {
					foreach($assignement->job->officers as $officer) {
						$officersArr[] = $officer->id; 
					}
					if(in_array($user->id,$officersArr)) {
						$row->show = TRUE;
					} else {
						$row->show = FALSE;
					}
				}
			}
			if(!$row->show) {
				unset($data->data[$key]);
			} else {
				/* Populate */
				$row->jobTitle = $row->job->title;
				$row->period = explode(' ', $row->job->start_at)[0].'-'.explode(' ', $row->job->end_at)[0];
				$row->jobQuizzes = view('ajax/assignments_quizzes', compact('row', 'user', 'uCat'))->render();
			}
		}

		$data->data = $data->data->values();

		return response()->json($data);
	}

	/**
	 * Display Jobs Listing
	 *
	 * @return Response
	*/	

	public function getJobs() {
		$data = new \stdClass;
		$data->data = Job::all();
		foreach($data->data as $row) {
            $row->title = $row->title;
			$row->candidates =  $row->candidates;
			$label = ($row->status)?'label-success':'label-danger';
			$stat =($row->status)?\Lang::get('messages.opened'):\Lang::get('messages.closed');
			$row->status = '<span class="label '.$label.'">'.$stat.'</span>';

			$row->actions = view('ajax/jobs_view', compact('row'))->render();
		}
		return response()->json($data);
	}
}
