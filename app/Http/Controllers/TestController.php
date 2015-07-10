<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Assignement;
use App\Quiz;
use App\Question;
use App\User_quiz;
use App\Given_answers;
use Auth;
use App\User;
class TestController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
    * Take test
    */

    public function take() {
        $assignement = Assignement::where('assigned_user', Auth::user()->id)->where('status', 0)->first();

        if(!$assignement) {
        	return redirect('test/score');
        }
        if(!$assignement->job->status) {
            return redirect('test/score');
        }
        $curDate = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime($curDate . ' - 1 day'));

        if($assignement->job->end_at < $yesterday || $assignement->job->start_at > $curDate) {
            $assignement->status = 1;
            $assignement->save();

            return redirect('test/score');
        }



        $job = $assignement->job;
        $users = User::whereIn('user_type_id', [3,4,6,8])->orderBy('id', 'ASC')->get();
        $emails = explode(';', $job->notified);

        $user_quizz = User_quiz::where('user_id', Auth::user()->id)->where('done', 0)->where('assignement_id', $assignement->id)->get();

        if(empty($user_quizz->toArray()) && !empty($assignement->toArray())) {
            $assignement->ended_at = \Carbon\Carbon::now()->toDateTimeString();
            $assignement->status = 1;
            $assignement->save();

            TestController::sendMails($job, $emails, $users);
            return redirect('test/score');
        }
        if($assignement->started_at == '0000-00-00 00:00:00') {
            $assignement->started_at = \Carbon\Carbon::now()->toDateTimeString();
            $assignement->save();
        } else {
            $user_quizz = User_quiz::where('user_id', Auth::user()->id)->where('done', 0)->where('assignement_id', $assignement->id)->first();

            if(is_null($user_quizz)) {
                    return redirect('test/score');
            } else {
                if(\Session::has('submitted')) {
                    \Session::forget('submitted');
                } else {
                    $user_quizz->done = 1;
                    $user_quizz->save();
                }
            }
        }

        $job = $assignement->job;
        $user_quizz = User_quiz::where('user_id', Auth::user()->id)->where('done', 0)->where('assignement_id', $assignement->id)->first();

        if(!$user_quizz) {
            $assignement->ended_at = \Carbon\Carbon::now()->toDateTimeString();
            $assignement->status = 1;
            $assignement->save();


            TestController::sendMails($job, $emails, $users);
        /*
        TO DO: Send email only if quiz has questions with free text
        TO DO: Create private function send emails params: obj jobs, array emails, obj users
        */

			return redirect('test/score');
        }

        $quizzes = $assignement->job->quizzes;
        $currentQuiz = $user_quizz->quiz;
        return view('test.take', compact('assignement', 'job', 'quizzes', 'assignement_id', 'currentQuiz'));
    }

    /**
    * Show user score
    */

    public function score() {
        $user = Auth::user();
        $assignements = Assignement::where('assigned_user', $user->id)->where('status', 1)->get();
        $score = [];
        foreach ($assignements as $assignement) {
            foreach ($assignement->quizzes as $quiz) {
                $score[$quiz->id] = 0;
                foreach($quiz->quiz->questions as $question) {
                        $score[$quiz->id] += $question->points;
                }
            }
        }
        return view('test.self_result', compact('assignements', 'score', 'user'));
    }

    /**
    * Test submission
    */

    public function submit(Request $request) {
        $input = $request->all();
        $assignement = Assignement::where('assigned_user', Auth::user()->id)->where('status', 0)->first();
        $mark = 0;
        $user_quizz = User_quiz::where('user_id', Auth::user()->id)->where('done', 0)->first();
        $currentQuiz = Quiz::find($input['quiz']);
        $eval = [];
        if(isset($input['question'])) {
            foreach ($currentQuiz->questions as $question) {
                if(array_key_exists($question->id, $input['question'])) {
                    $correctAnswers = $question->correctAnswers->toArray();
                    $questionPoints = $question->points;
                    $correctAnswersCount = count($correctAnswers);
                    $allAnswersCount = $question->answers->count();
                    $givenAnswersCount = count($input['question'][$question->id]);
                    $givenCorrectAnswersCount = 0;

                    /**
                    * add given answers to db
                    */

                    if($question->question_type_id == 3) {
                        $given_answer = new Given_answers;
                        $given_answer->assignement_id = $assignement->id;
                        $given_answer->question_id = $question->id;
                        $given_answer->quiz_id = $input['quiz'];
                        $given_answer->answer = $input['question'][$question->id];
                        $given_answer->save();
                    } else {
                        foreach ($input['question'][$question->id] as $answer) {
                            $given_answer = new Given_answers;
                            $given_answer->assignement_id = $assignement->id;
                            $given_answer->question_id = $question->id;
                            $given_answer->quiz_id = $input['quiz'];
                            $given_answer->answer_id = $answer;
                            $given_answer->save();
                        }
                    }
                    /**
                    * add given answers to db
                    */

                    switch ($question->question_type_id) {
                        case 1:
                            foreach ($correctAnswers as $correctAnswer) {
                                if(in_array($correctAnswer['id'], $input['question'][$question->id])) {
                                        $givenCorrectAnswersCount++;
                                }
                            }
                            if($givenAnswersCount < $correctAnswersCount) {
                                $eval[$question->id] = round((int)$questionPoints * ((int)$givenCorrectAnswersCount / (int)$correctAnswersCount), 1);
                            }elseif(($givenAnswersCount == $allAnswersCount) && ($correctAnswersCount != $allAnswersCount)) {
                                $eval[$question->id] = 0;
                            } else {
                                $eval[$question->id] = round((int)$questionPoints * ((int)$givenCorrectAnswersCount / (int)$correctAnswersCount) * ((int)$correctAnswersCount / (int)$givenAnswersCount), 1);
                            }
                            break;
                        case 2:
                            foreach ($correctAnswers as $correctAnswer) {
                                if(in_array($correctAnswer['id'], $input['question'][$question->id])) {
                                    $givenCorrectAnswersCount++;
                                }
                                if($givenCorrectAnswersCount != 0) {
                                    $eval[$question->id] = $questionPoints;
                                }
                            }
                            break;
                        case 3:
//                                              echo 'Single<br>';
                            break;
                        case 4:
                                // Multiple Text
                            break;
                    }
                } else {

                }
            }
        }

        $final_mark = 0;
        foreach ($eval as $question => $points) {
            $final_mark += $points;
        }

        $user_quizz->done = 1;
        $user_quizz->mark = $final_mark;
        $user_quizz->save();
        \Session::put('submitted', true);

        return redirect('test');
    }
    /**
    * Add quiz comment
    */

    public function comment(Request $request) {
        $input = $request->all();
        $this->validate($request, [
                'reason' => '',
        ]);
    }

    /**
    * Show Test results review
    */
    public function result($uid, $aid, $qid, Request $request) {

        $user_quiz = User_quiz::where('assignement_id', $aid)->where('quiz_id', $qid)->where('user_id', $uid)->first();
        if($request->method() == 'POST') {
            $input = $request->all();

            $user_quiz->reason = $input['reason'];
            $user_quiz->save();

            $assignement = Assignement::where('id', $aid)->where('status', 1)->first();
            $job = $assignement->job;

            $users = User::whereIn('user_type_id', [3,4,6,8])->orderBy('id', 'ASC')->get();
            $emails = explode(';', $job->notified);

            TestController::sendMails($job, $emails, $users, TRUE);

            return redirect()->back();
        } else {
            $quiz = Quiz::find($qid);
            $assignement = Assignement::find($aid);
            //$job = Job::find($assignement->assigned_job);
            return view('test.result', compact('quiz', 'assignement', 'answers', 'uid', 'user_quiz'));
        }
    }
    /**
    * Continue to test page
    */
    public function goToTest() {
            return view('test.continue');
    }

    /**
    * Ajax save points for single text questions
    */
    public function save_points(Request $request) {
        if($request->ajax()){
            $input = $request->all();

            $question = Question::find($input['question_id']);
            if($question->points < (int)$input['points']) {
                    // cant give more points than the question is worth
                return response()->json([0, \Lang::get('messages.no_point')]);
            } elseif(!is_numeric($input['points'])) {
                return response()->json([0, \Lang::get('messages.not_numeric')]);
            } else {
                $given_answer = Given_answers::where('assignement_id', $input['assignement_id'])->where('question_id', $input['question_id'])->where('quiz_id', $input['quiz_id'])->first();
                $user_quiz = User_quiz::where('assignement_id', $input['assignement_id'])->where('user_id', $input['user_id'])->where('quiz_id', $input['quiz_id'])->first();
                $user_quiz->mark = ($user_quiz->mark - $given_answer->points) + $input['points'];
                $user_quiz->save();

                $given_answer->points = $input['points'];
                $given_answer->save();

                /**
                * iau total (pentru quiz) minus max puncte pentru intrebarea asta dupa care adaug la user_quiz  ( total (pentru quiz) minus max puncte pentru intrebarea asta ) + puncte calculate
                */
                return response()->json([1, \Lang::get('messages.saved')]);
            }
        }
    }


    public function self_result($uid, $aid, $qid, Request $request) {
        $user_quiz = User_quiz::where('assignement_id', $aid)->where('quiz_id', $qid)->where('user_id', $uid)->first();
        if($request->method() == 'POST') {
            $input = $request->all();
            $user_quiz->reason = $input['reason'];
            $user_quiz->save();
            return redirect()->back();
        } else {
            $quiz = Quiz::find($qid);
            $assignement = Assignement::find($aid);

            return view('test.self', compact('quiz', 'assignement', 'answers', 'uid', 'user_quiz'));
        }
    }

    /**
    * Send Emails
    */

    private static function sendMails($job, $emails, $users, $full = FALSE){

		if(!$full) {
	        $sendfull = FALSE;
	        foreach ($job->quizzes as $job_quizz) {
                $send = FALSE;

                foreach($job_quizz->questions as $qQuestion){
                    if($qQuestion->question_type_id == 3){
                        $send = TRUE;
                        $sendfull = TRUE;
                    }
                }

                if($send){
                    foreach($job_quizz->category->users as $technicians) {
                      \Mail::send('emails.technicians', compact('technicians'), function($message) use ($technicians)
                        {
							$message->to($technicians->email)->subject(\Lang::get('messages.assignement'));
                        });
                    }
                }
	        }
		}


        $emails=explode(';', $job->notified);
        if(!empty($emails) && $emails[0] != '') {
            foreach($emails as $notify){
                $user=Auth::user();
				\Mail::send('emails.notifiers', compact('user', 'job'), function($message) use ($user, $job, $notify)
				{
					$message->to($notify)->subject(\Lang::get('messages.tests'));
				});
            }
        }

        if($full || !$sendfull) {

            $officers = [];
            foreach($job->officers as $officer){
                    $officers[] = $officer->id;
            }

            foreach($users as $user){

                if($user->user_type_id == 3 && in_array($user->id, $officers)){
                    \Mail::send('emails.hr_officer', compact('user', 'job'), function($message) use ($user, $job)
                    {
                             $message->to($user->email)->subject(\Lang::get('messages.tests'));
                    });

                } elseif($user->user_type_id == 8 && in_array($user->id, $officers)){
					\Mail::send('emails.hr_team_leader', compact('user', 'job'), function($message) use ($user, $job)
					{
						$message->to($user->email)->subject(\Lang::get('messages.tests'));
					});
                } else {
                	continue;
                }
            }
        }
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
    public function destroy($id)
    {
            //
    }

}
