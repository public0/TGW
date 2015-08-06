<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\DB;

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
	    $user = Auth::user();
	    $uCat = [];
	    $userCategories = $user->categories;
	    foreach ($userCategories as $userCategory) {
	            $uCat[] = $userCategory->id;
	    }
	    if($user->user_type_id == 4){
	            $data->data = Category::whereIn('id', $uCat)->get();
	    }else{
	            $data->data = Category::all();
	    } 
        
	    foreach($data->data as $row) {
	            $row->name = $row->name;

	            $row->technicians = '';
	            foreach ($row->users as $key => $value) {
	             	$row->technicians .= $value['name'].' '.$value['surname'].'<br />';
	            }

	            $row->quizzesCount =  $row->quizzes->count();
	            $row->actions = view('ajax/categories_view', compact('row'))->render();
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
		$user = Auth::user();
		$uCat = [];
		$uJob = [];
	
		
		$userCategories = $user->categories;
		
		foreach ($userCategories as $userCategory) {
			$uCat[] = $userCategory->id;
		}
		
		foreach ($user->jobs as $userJob) {
			$uJob[] = $userJob->id;
		}

    	if($user->user_type_id == 4 ) {
			foreach($data->data as $key => $row) {
				$quizJobs = FALSE;

				foreach($row->jobs as $qj) {
					if (!empty($qj->assigned->toArray())) {
						$quizJobs = TRUE;
					}					
				}
                foreach($row->assigned as $aQuiz){
                   if (!empty($aQuiz)) {
						$quizJobs = TRUE;
					}					
				}
				if(in_array($row->category['id'], $uCat) || ($row->user_id != 0 && $user->id == $row->user_id) ) {
					$row->categoryName = $row->category['name'];
					if(in_array(18, $this->privsArray)) {
			    		if( /*!$quizJobs && */!$row->assigned->count()) {
							$row->privileges = '
								<form method="GET" action="'.\URL::to('/').'/questions/'.$row->id.'" accept-charset="UTF-8">
									<input class="btn-sm label-info" type="submit" value="'. \Lang::get("messages.edit").'">
								</form>
							';
			    		} else {
							$row->privileges = '
								<form method="GET" action="'.\URL::to('/').'/questions/show_questions/'.$row->id.'" accept-charset="UTF-8">
									<input class="btn-sm label-info" type="submit" value="'. \Lang::get("messages.view").'">
								</form>
							';
			    		}
					} else {
						$row->privileges = '';
					}
					$label = ($row->status)?'label-success':'label-danger';
				    $stat_quiz =($row->status)?\Lang::get('messages.active'):\Lang::get('messages.inactive');
				    $row->status = '<span class="label '.$label.'">'.$stat_quiz.'</span>';
					
					$row->actions = view('ajax/quizzes_view', compact('row', 'quizJobs','user'))->render();
				} else {
					unset($data->data[$key]);
				}
			}
    	} elseif($user->user_type_id == 3 || $user->user_type_id == 8) {

			foreach($data->data as $key => $row) {
				$quizJobs = FALSE;
                $continue = FALSE;
				foreach($row->jobs as $qj) {
					if (!empty($qj->assigned->toArray())) {
						$quizJobs = TRUE;
					}	
					if(array_intersect(array($qj->id), $uJob)){
						$continue =TRUE;
				 	}			
				}
                foreach($row->assigned as $aQuiz){
                   if (!empty($aQuiz)) {
						$quizJobs = TRUE;
					}					
				}   
				if($continue){
						
					$row->categoryName = $row->category['name'];
					if(in_array(18, $this->privsArray) ) {
			    		if( /*!$quizJobs && */!$row->assigned->count()) {
							$row->privileges = '
								<form method="GET" action="'.\URL::to('/').'/questions/'.$row->id.'" accept-charset="UTF-8">
									<input class="btn-sm label-info" type="submit" value="'. \Lang::get("messages.edit").'">
								</form>
							';
			    		} else {
							$row->privileges = '
								<form method="GET" action="'.\URL::to('/').'/questions/show_questions/'.$row->id.'" accept-charset="UTF-8">
									<input class="btn-sm label-info" type="submit" value="'. \Lang::get("messages.view").'">
								</form>
							';
			    		}
					} else {
						$row->privileges = '';
				    }
				        $label = ($row->status)?'label-success':'label-danger';
				        $stat_quiz =($row->status)?\Lang::get('messages.active'):\Lang::get('messages.inactive');
				        $row->status = '<span class="label '.$label.'">'.$stat_quiz.'</span>';
						$row->actions = view('ajax/quizzes_view', compact('row', 'quizJobs','user'))->render();
				} else {
					unset($data->data[$key]);
				}
								

			}
				//return response()->json($qJob);	
    	}else{
			foreach($data->data as $key => $row) {
				$quizJobs = FALSE;
					//dd($row->assigned);

				foreach($row->jobs as $qj) {
					if (!empty($qj->assigned->toArray())) {
						$quizJobs = TRUE;
					}					
				}
				foreach($row->assigned as $aQuiz){
                   if (!empty($aQuiz)) {
						$quizJobs = TRUE;
					}					
				}
				$row->categoryName = $row->category['name'];
				if(in_array(18, $this->privsArray) ) {
		    		if( /*!$quizJobs && */!$row->assigned->count()) {
						$row->privileges = '
							<form method="GET" action="'.\URL::to('/').'/questions/'.$row->id.'" accept-charset="UTF-8">
								<input class="btn-sm label-info" type="submit" value="'. \Lang::get("messages.edit").'">
							</form>
						';
		    		} else {
						$row->privileges = '
							<form method="GET" action="'.\URL::to('/').'/questions/show_questions/'.$row->id.'" accept-charset="UTF-8">
								<input class="btn-sm label-info" type="submit" value="'. \Lang::get("messages.view").'">
							</form>
						';
		    		}
				} else {
					$row->privileges = '';
				}
				if($row->status == 1){
			    	$quiz_stat = 0;
			    	$row->status= '
							<form method="GET" action="'.\URL::to('/').'/quiz/status/'.$row->id.'/'.$quiz_stat.'" accept-charset="UTF-8">
							   	<input class="btn-sm label-info" type="submit" value="'. \Lang::get("messages.active").'">
							</form>
						';
			    }else{
			    	$quiz_stat = 1;
			    	$row->status =  '

							<form method="GET" action="'.\URL::to('/').'/quiz/status/'.$row->id.'/'.$quiz_stat.'" accept-charset="UTF-8">
							    <input class="btn-sm label-danger" type="submit" value="'. \Lang::get("messages.inactive").'">
							</form>
						';
			    }
				$row->actions = view('ajax/quizzes_view', compact('row', 'quizJobs','user'))->render();
			}
    	}

		$data->data = $data->data->values();
		return response()->json($data);
	}
	/**
	* Display Users Listing
	*/
	public function getUsers() {
		$data = new \stdClass;
        $logged_user = Auth::user()->user_type_id;
        if($logged_user == 2){
           $data->data = User::whereIn('user_type_id',[3,6,8])->get();
        }elseif($logged_user == 3){
          $data->data = User::whereIn('user_type_id',[6])->get();
        }elseif($logged_user == 8){
          $data->data = User::all()->whereIn('user_type_id',[3,6])->get();
        }else{
              $data->data = User::all();
        }
 
        foreach($data->data as  $row) {
                $row->uType = $row->type->type;
                $row->fullName = $row->name.' '.$row->surname;
                $row->actions = view('ajax/users_view', compact('row'))->render();
                $label = ($row->status)?'label-success':'label-danger';
                $stat =($row->status)?\Lang::get('messages.active'):\Lang::get('messages.inactive');
                $row->status = '<span class="label '.$label.'">'.$stat.'</span>';
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


		//$data->data = Assignement::All();


		foreach($data->data as $key => $row) {
			$officersArr = [];
			$row->show = TRUE;
			
			// if(!isset($row->quizzes)){
			// 	$row->show = FALSE;
			// 	break;
			// }	

			if(empty($row->quizzes->toArray()) && $user->user_type_id == 4 && !empty($uCat) ) {
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
		    		if($quiz->quiz->user_id != 0 && $user->id == $quiz->quiz->user_id) {
		    			$row->show = TRUE;
		    			break;
		    		}
	    		} else {
		    		   $row->show = TRUE;
	    		}
//	    		echo $row->show.'-'.$quiz->quiz->id.'|';
	    	}
			if(in_array($user->user_type_id, [3, 8])) {
				if($row->job->officers) {
					foreach($row->job->officers as $officer) {
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
				$row->period = explode(' ', $row->job->start_at)[0].' - '.explode(' ', $row->job->end_at)[0];
				$row->jobQuizzes = view('ajax/assignments_quizzes', compact('row', 'user', 'uCat'))->render();
				$row->candidates = view('ajax/assignment_candidates', compact('row'))->render();

			//  //jobs_assignments	
			//	$row->actions = view('ajax/quiz_assignment_action', compact('row', 'quiz', 'user', 'uCat'))->render();//jobs_assignment_action', compact('row', 'user', 'uCat'))->render();
			//  //jobs_assignments
			}
		}
//		die();
		$data->data = $data->data->values();
		return response()->json($data);
	}
	/**
	* Display Quiz Assignments
	*/

	public function getAssignedQuizzes($aid, $qid) { // Show Assignments - Quizzes only for selected job : initial doar un parametru $qid
		
		$data = new \stdClass;
		$user = Auth::user();
		$userCategories = $user->categories;
		$uCat = [];
		foreach ($userCategories as $userCategory) {
			$uCat[] = $userCategory->id;
		}
		// Show Assignments - Quizzes only for selected job
		$assJobId = DB::table('assignements')->where('id','=', $aid)->lists('assigned_job');
		$data->data = Assignement::with(['quizzes' => function($query) use ($qid){
			$query->whereIn('quiz_id', [$qid]);
		}])->where('assigned_job','=', $assJobId[0])->orderBy('id', 'DESC')->get();
		// Show Assignments - Quizzes only for selected job
		$score = [];
		$i = 1;
		$job = [];
		foreach($data->data as $key => $row) {
			
			if(isset($row->user->name)) {
				if(isset($row->quizzes) && !$row->quizzes->isEmpty()) {
					foreach ($row->quizzes as $quiz) {
						if($quiz->quiz->score) {
							$score[$quiz->id] = $quiz->quiz->score;
						} else {
							$score[$quiz->id] = 0;
							foreach($quiz->quiz->questions as $question) {
								$score[$quiz->id] += $question->points;
							}
							$setQuiz = Quiz::find($quiz->quiz->id);
							$setQuiz->score = $score[$quiz->id];
							$setQuiz->save();
						}

					    if(array_key_exists($row->job->id, $job)) {
					    	$i = $job[$row->job->id];
					    	$job[$row->job->id] = $job[$row->job->id]+1;
					    } else {
					    	$i = 1;
				    		$job += [$row->job->id => $i];
					    }

					    /*Populate Here*/
					      $creator = User::find($quiz->quiz->user_id);
						   $uUnCat = DB::table('category_user')->where('category_id', $quiz->quiz->category_id)->lists('user_id');
					      if(!empty($uUnCat)){
					         $tech = User::find($uUnCat[0]);
                          }else{
                          	$tech = '';
                          }
					    $row->jobTitle  = $row->job->title.'('.$row->job->candidates.')';
					    //$row->QuizTitle = $quiz->quiz->name.'<br /><small><i>[by '.$creator->name.' '.$creator->surname.']</i></small>';
					     if(!empty($creator) && !empty($tech)){
                           $row->QuizTitle = $quiz->quiz->name.'<br /><small><i>by '.$creator->name.' '.$creator->surname.'</i></small>'.'<br /><small><i>Tech: '.$tech->name.' '.$tech->surname.'</i></small>';
					    }elseif(!empty($tech)){
                           $row->QuizTitle = $quiz->quiz->name.'<br /><small><i>Tech: '.$tech->name.' '.$tech->surname.'</i></small>';	

					    }else{
					    	$row->QuizTitle = $quiz->quiz->name.'<br />';
					    }
					   
				    	if(!empty($row->user->name)) {
						    $row->userName  = $row->user->name.' '.$row->user->surname;
				    	} else {
				    		$row->userName = $row->user->login;
				    	}
					   
				    	if(!empty($row->user->name)) {
						    $row->userName  = $row->user->name.' '.$row->user->surname;
				    	} else {
				    		$row->userName = $row->user->login;
				    	}


						if(isset($row->started_at)) {
							$timestamp = '<span class="hidden">'.strtotime(date("d-m-Y", strtotime($row->started_at)).date("h:m:s", strtotime($row->started_at))).'-</span>';
                            $date = $timestamp.date("d-m-Y", strtotime($row->started_at));
                            $time = date("h:m:s", strtotime($row->started_at));
                            $row->started_at = ($row->started_at != '0000-00-00 00:00:00')?$date.'<br>'.$time:\Lang::get('messages.not_started');
						}

						$row->goal = view('ajax/quiz_assignment_pass_score', compact('row', 'quiz', 'user', 'uCat'))->render();

						if($score[$quiz->id]) {
							$row->score = (!$quiz->done)?'0%': round(($quiz->mark / $score[$quiz->id]) * 100, 1).'%';
						} else {
							$row->score = '0%';
						}

						// gata
						if($quiz->final == 1){
							$gata = '<small>FINAL</small>';//asset('/images/blinking_green_light.jpg');
						}else{
							$gata = '<small><i>pending</i></small>';//asset('/images/blinking_green_light.gif');
						}
						$row->gata = $gata;//'<img src="'.$srcImg.'">';
						// gata

						$row->quizShow = '<a href="'.url('results/'.$quiz->user_id.'/'.$row->id.'/'.$quiz->quiz_id).'">'.\Lang::get($quiz->quiz->name).'</a><br>';

					//  quiz_assignments

						if(in_array(16, $this->privsArray)) {
							$row->actions = view('ajax/quiz_assignment_action', compact('row', 'quiz', 'user', 'uCat'))->render();
						} else {							
							$row->actions = '';
						}

					    $i++;
					//  quiz_assignments
					}
				} else {
					/* Assignment to a job with on quizzes*/
					/* Empty and reindex array*/
					unset($data->data[$key]);
				}
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
		$user = Auth::user();
	    $userJobs = $user->jobs;
	    $uJob = [];
	    foreach ($userJobs as $userJob) {
	            $uJob[] = $userJob->id;
	    }
		    if($user->user_type_id == 3){
		           $data->data = Job::whereIn('id', $uJob)->get();
		    }else{
		           $data->data = Job::all();
		    } 
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

	public function assignedUsers() {
        $data = new \stdClass;
		$input = \Input::get('option');
//		$job = Job::find($input);
		$uJobs = [];
        $users = User::select(\DB::raw("CONCAT(name, ' ', surname) AS full_name, id"))->where('user_type_id',6)->where('status', 1)->get();
	
		foreach($users as $user){
			$showUser = TRUE;
           foreach($user->assignedJobs as $job){
           
				if(array_intersect($input,array($job->assigned_job))){
					$showUser = FALSE;		
				}		
			}
			if($showUser){
				
				$uJobs[$user->id] = $user->full_name;//'<option value ="'.$user->id.'" >'.$user->full_name.'</option>';
			}
		}
	
		return response()->json($uJobs);
	}

}
