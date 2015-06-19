<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Assignement;
use App\User_quiz;
use App\Given_answers;
use Auth;
use Illuminate\Http\Request;

class AssignementController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$search = $request->all();
		$assignements = NULL;
		$score = [];
		
		if($search && !empty($search['q'])) {
			if(!empty($search['s']) && (int)$search['s'] == 1) {
			$assignements = Assignement::with(['job' => function($query) use ($search) {
				$query->whereRaw('title LIKE ?', ['%'.$search['q'].'%']);
			}, 'user' => function($query) use ($search){
			}])->orderBy('id', 'DESC')->get();

			} else {
				$assignements = Assignement::with(['job' => function($query) use ($search) {
					//$query->orWhereRaw('title LIKE ?', ['%'.$search['q'].'%']);
				}, 'user' => function($query) use ($search){
					$query->whereRaw('email LIKE ?', ['%'.$search['q'].'%']);				
					$query->orWhereRaw('login LIKE ?', ['%'.$search['q'].'%']);				
				}])->orderBy('id', 'DESC')->get();

			}
		} else {
/*			$assignements = Assignement::orderBy('id', 'DESC')->paginate(30);*/
			$assignements = Assignement::orderBy('id', 'DESC')->get();
		}
		$score = [];
		foreach ($assignements as $assignement) {
			foreach ($assignement->quizzes as $quiz) {
				$score[$quiz->id] = 0;
				foreach($quiz->quiz->questions as $question) {
					$score[$quiz->id] += $question->points;
				}
			}
		}
		return view('assignement.show_assignements', compact('assignements','score', 'search'));
	}

	public function jobs_assignements(Request $request) {
		if(!in_array(14, $this->privsArray)) {			
			return redirect()->back();
		}
			return view('assignement.jobs_assignements', compact('assignements','score', 'search', 'user', 'uCat'));
	}

	public function quiz_assignements($aid, $qid, Request $request) {
		if(!in_array(14, $this->privsArray)) {			
			return redirect()->back();
		}
		return view('assignement.quiz_assignements', compact('assignements','score', 'search', 'user', 'uCat'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!in_array(13, $this->privsArray))
			return redirect()->back();
		$jobs = [ 0 => \Lang::get('messages.select')];
		$jobs += Job::where('status', '1')->lists('title', 'id');
		$users = User::select(\DB::raw("CONCAT(name, ' ', surname) AS full_name, id"))->where('user_type_id',6)->lists('full_name', 'id');

		return view('assignement.new_assignement', compact('jobs', 'users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
	        'assigned_job' => 'required|exists:jobs,id',
		]);
		if((int)$input['assigned_job'] == 1) {
/*			$job = Job::find($input['assigned_job']);
			$setQuiz = $job->quizzes->first()->toArray();

			$users = User::where('user_type_id', 5)->get();
			foreach ($users as $user) {
				$assignementData = [
					'assigned_job'  => $input['assigned_job'],
					'assigned_user' => $user->id
				];
				$newAssignement = Assignement::create($assignementData);
				$user->assigned = 1;
				$user->save();
*/
				/**
				* userQuiz do determine what quizzes were done for respective assignement
				*/
/*				\Mail::send('emails.assigned_user', compact('user', 'job'), function($message)
				{
				    $message->to($user->email)->subject(\Lang::get('messages.assignement'));
				});
*/
/*				$quizzes = $job->quizzes->toArray();
				foreach ($quizzes as $quiz) {
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
*/
		} else {
			$this->validate($request, [
			        'assigned_users' => 'required'
			]);

			$job = Job::find($input['assigned_job']);

			foreach($input['assigned_users'] as $assigned_user) {
				$assignementData = [
					'assigned_job'  => $input['assigned_job'],
					'assigned_user' => $assigned_user
				];
				$newAssignement = Assignement::create($assignementData);
				$user = User::find($assigned_user);
				$user->assigned = 1;
				$user->save();
				/**
				* userQuiz do determine what quizzes were done for respective assignement
				*/

				\Mail::send('emails.assigned_user', compact('user', 'job'), function($message) use ($user, $job)
				{
				    $message->to($user->email)->subject(\Lang::get('messages.assignement'));
				});


				$quizzes = $job->quizzes->toArray();
				foreach ($quizzes as $quiz) {
					$userQuizData = [
						'user_id' => $assigned_user,
						'quiz_id' => $quiz['id'],
						'assignement_id' => $newAssignement->id,
						'mark' => 0,
						'done' => 0
					];
					$userQuiz = User_quiz::create($userQuizData);
				}

			}
		}
		return redirect('jobs_assignements');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($aid, $qid)
	{
		if(!in_array(16, $this->privsArray))
			return redirect()->back();
		$given_answers = Given_answers::where('assignement_id', $aid)->where('quiz_id', $qid);
		$assignement = Assignement::find($aid);
		$given_answers->delete();
		$assignement = Assignement::find($aid)->delete();
		return redirect()->back();
	}

}