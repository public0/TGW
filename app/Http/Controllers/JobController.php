<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;
use App\Job;
use App\Quiz;
use App\Category;
use App\User;

class JobController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if(!in_array(22, $this->privsArray))
			return redirect()->back();
		$search = $request->all();
		$jobs = NULL;

		if($search && !empty($search['q'])) {
			$jobs = Job::whereRaw('title LIKE ? OR description LIKE ?', ['%'.$search['q'].'%','%'.$search['q'].'%'])->paginate(10);
		} else {
			$jobs = Job::paginate(30);
		}
		return view('jobs.show_jobs', compact('jobs'));		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!in_array(21, $this->privsArray))
			return redirect()->back();
		$quizzes = Quiz::lists('name', 'id');
		$officers = User::select('id', \DB::raw('CONCAT(name, " ", surname) AS name'))->whereIn('user_type_id', [3, 8])->lists('name','id') ;
		return view('jobs.new_job', compact('quizzes', 'officers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
		        'title' => 'required|max:255',
		        'candidates' => 'integer',
		        'quizzes' => 'required',
		        'job_officer' => 'required'
		]);
		$input = $request->all();
		$newJob = Job::create($input);
		$newJob->officers()->attach($input['job_officer']);
		foreach ($input['quizzes'] as $quiz) {
			$newJob->quizzes()->attach($quiz);
		}
		return redirect('jobs');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!in_array(23, $this->privsArray))
			return redirect()->back();

		$quizzes = Quiz::lists('name', 'id');
		$officers = User::select('id', \DB::raw('CONCAT(name, " ", surname) AS name'))->whereIn('user_type_id', [3, 8])->lists('name','id') ;
		$job = Job::find($id);

		return view('jobs.edit_job', compact('quizzes','job','id','officers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$this->validate($request, [
		        'title' => 'required|max:255',
		        'candidates' => 'integer',
		        'quizzes' => 'required',
//		        'job_officer' => 'required'
		]);
		$input = $request->all();
		$job = Job::find($id);
		$job->title = $input['title'];
		$job->description = $input['description'];
		$job->candidates = $input['candidates'];
		$job->status = (int)$input['status'];
		$job->start_at = $input['start_at'];
		$job->end_at = $input['end_at'];
		$job->save();
		$job->quizzes()->detach();
		if (!in_array('0', $input['quizzes'])) {
			foreach ($input['quizzes'] as $quiz) {
				$job->quizzes()->attach($quiz);
			}
		}
		$job->officers()->detach();
		$job->officers()->attach($input['job_officer']);
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
		if(!in_array(24, $this->privsArray))
			return redirect()->back();
		$job = Job::find($id);
		$job->quizzes()->detach();
		$job->delete();
		return redirect('jobs');
	}

}
