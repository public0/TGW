<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use App\Job;
use App\Quiz;
use App\Category;
use App\User;
use Storage;

class JobController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{    
		if(!in_array(22, $this->privsArray)){
			return redirect()->back();
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
		$quizzes = Quiz::where('category_id', '!=', 1)->where('status',1)
			->orWhere('category_id', 1)->where('status',1)
			->orderBy('name','asc')
			//->where('from', '<',\Carbon\Carbon::now())
			//->where('to', '>',\Carbon\Carbon::now())
			->lists('name', 'id');
		$officers = User::select('id', \DB::raw('CONCAT(name, " ", surname) AS name'))->whereIn('user_type_id', [3, 8])->where('status',1)->orderBy('name','asc')->lists('name','id') ;
		return view('jobs.new_job', compact('quizzes', 'officers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

        $emails = explode(';', $request->notified);
        $emailsCount = count($emails);
        $emailError = \Lang::get('messages.emailError');
        $error = FALSE;

        if ($emailsCount == 1) {

			$this->validate($request, [
			        'notified' => 'email',
			]);

        } else {
	           	foreach($emails as $email){
	        		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			 			return redirect()->back()->withErrors(['notified' => \Lang::get("messages.email_error")]); 
		      		}
		      	}
	      	}

		$this->validate($request, [
				'start_at' => 'required',
				'end_at' => 'required',
		        'title' => 'required|max:255',
		        'candidates' => 'required|integer',
		        'quizzes' => 'required',
//		        'job_officer' => 'required'
		]);

		$input = $request->all();
		$input['user_id'] = Auth::user()->id;
		$newJob = Job::create($input);

		$logMessage = \Carbon\Carbon::now().' :: User: '.Auth::user()->name.' '.Auth::user()->surname.' created the job '.$newJob->title;
		Storage::disk('local')->append('actions_log.log', $logMessage);

		if(!empty($input['job_officer'])) {
			$newJob->officers()->attach($input['job_officer']);
		}
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

		$quizzes = Quiz::where('category_id', '!=', 1)->where('status',1)
			->orWhere('category_id', 1)->where('status',1)
			//->where('from', '<',\Carbon\Carbon::now())
			//->where('to', '>',\Carbon\Carbon::now())
			->lists('name', 'id');

		$officers = User::select('id', \DB::raw('CONCAT(name, " ", surname) AS name'))->whereIn('user_type_id', [3, 8])->where('status',1)->lists('name','id') ;
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
				'start_at' => 'required',
				'end_at' => 'required',
		        'title' => 'required|max:255',
		        'candidates' => 'integer',
		        'quizzes' => 'required',
		       // 'job_officer' => 'required'
		]);
		$input = $request->all();
		$job = Job::find($id);
		$job->title = $input['title'];
		$job->description = $input['description'];
		$job->candidates = $input['candidates'];
		$job->status = (int)$input['status'];
		$job->start_at = $input['start_at'];
		$job->end_at = $input['end_at'];
		$job->notified = $input['notified'];
		$job->save();
		$job->quizzes()->detach();
		if (!in_array('0', $input['quizzes'])) {
			foreach ($input['quizzes'] as $quiz) {
				$job->quizzes()->attach($quiz);
			}
		}
		$emails = explode(';', $job->notified);
        $emailsCount = count($emails);
        
        if ($emailsCount == 1) {

			$this->validate($request, [
			        'notified' => 'email',
			]);

        } else {
        	   	foreach($emails as $email){
            		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			 		 return redirect()->back()->withErrors(['notified' => \Lang::get("messages.email_error")]); 
					}
	       		 }
		   	}

		$job->officers()->detach();
		if(!empty($input['job_officer'])) {
			$job->officers()->attach($input['job_officer']);
		}

//		return redirect()->back();
		return redirect('jobs');

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
		$logMessage = \Carbon\Carbon::now().' :: User: '.Auth::user()->name.' '.Auth::user()->surname.' deleted the job '.$job->title;
		Storage::disk('local')->append('actions_log.log', $logMessage);
		return redirect('jobs');
	}

}
