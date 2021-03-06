<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use App\Quiz;
use Request;
use App\Question;
use App\Answer;
use App\Question_type;
use Illuminate\Http\Request as Req;
use Validator;

class QuestionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!in_array(18, $this->privsArray))
			return redirect()->back();
		$search = Request::all();
		$questions = NULL;

		if($search && !empty($search['q'])) {
			$questions = Question::whereRaw('question LIKE ?', ['%'.$search['q'].'%'])->paginate(10);
		} else {
/*			$questions = Question::paginate(10);*/
			$questions = Question::get();
		}
		return view('questions.show_questions', compact('questions'));		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!in_array(17, $this->privsArray))
			return redirect()->back();
		$answer_counter = 3;
		$types = Question_type::lists('type', 'id');
		return view('questions.new_question', compact('types', 'answer_counter'));		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Request::all();

		$newQuestion = Question::create($input);
		$newQuestion->code = $input['code'];
		$newQuestion->save();
		switch ($input['question_type_id']) {
			case '1':
				$answers = count($input['multi_text']);
				for ($i=0; $i < $answers; $i++) {
					$newAnswer = new Answer;
					$newAnswer->question_id = $newQuestion->id;
					$newAnswer->answer = $input['multi_text'][$i];
					$newAnswer->correct = $input['multi_value'][$i];
					$newAnswer->save();
				}
				break;
			case '2':
				$answers = count($input['single_text']);
				$correctAnswer = $input['single_value'];
				for ($i=0; $i < $answers; $i++) {
					$newAnswer = new Answer;
					$newAnswer->question_id = $newQuestion->id;
					$newAnswer->answer = $input['single_text'][$i];
					$newAnswer->correct = ($i == (int)$correctAnswer)?1:0;
					$newAnswer->save();					
				}
				break;

			case '3':
					$newAnswer = new Answer;
					$newAnswer->question_id = $newQuestion->id;
					$newAnswer->answer = $input['single_text'];
					$newAnswer->correct = 1;
					$newAnswer->save();

				break;
			case '4':

				break;			
		}

		return redirect('questions');
	}

	/**
	 * Display new question form for specified quizz.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function quiz_create($id)
	{
		if(!in_array(17, $this->privsArray))
			return redirect()->back();
		$answer_counter = 3;
		$types = Question_type::lists('type', 'id');
		return view('questions.new_question', compact('types', 'id', 'answer_counter'));		
	}

	/**
	 * Store new question for specified quizz form.
	 *
	 * @param  int  $id
	 * @return Question resource
	 */
	public function quiz_store($id, Req $request)
	{


		$this->validate($request, [
		        'points' => 'required|numeric',
		        'question' => 'required',
		        'question_type_id' => 'required',
		]);

		$input = Request::all();
	
		
		switch ($input['question_type_id']) {
			case '1':
				$go = FALSE;
				$text = 'error: ';
				if($input['multi_text']) {
					$answers = count($input['multi_text']);
					$answersText = 0;
					$checks = 0;
					for ($i=0; $i < $answers; $i++) {
						if(!empty($input['multi_text'][$i])){
							$answersText++;
						}
						if(!empty($input['multi_value'][$i])){
							$checks++;
						}
					}
					if($answersText == $answers && $checks > 1){
						$go = TRUE;
					}else{
						if($answersText != $answers){
							$text .= 'One of "Answers" boxes is empty!';
						}
						if($checks == 0){
							$text .= ' All of "Correct" boxes are empty!';
						}
						if($checks == 1){
							$text .= ' At least two of "Correct" boxes MUST be checked!';						
							//$go = TRUE;
						}
					}
				}else{
					$text = 'All of "Answers" boxes are empty!';
				}
				break;
			case '2':
				$go = FALSE;
				$text = '';
				if(isset($input['single_text']) && isset($input['single_value'])) {
					$answers = count($input['single_text']);
					$correctAnswer = $input['single_value'];
					$hasValue = FALSE;
					$answersText = 0;
					for ($i=0; $i < $answers; $i++) {
						if(!empty($input['single_text'][$i])){
							$answersText++;
						}
						$hasValue = TRUE;				
					}
					if($answersText == $answers && $hasValue){
						$go = TRUE;
					}else{
						$text = 'At least one of "Answers" boxes is empty. Do the right thing, please.';
					}
				}else{
					$text = 'All "Answers" boxes are empty and/or all of "Correct" boxes are empty. Do the right thing, please.';
				}
				break;
			case '3':
				$go = FALSE;
				$text = '';
				if(isset($input['single_text'])) {
					if(empty($input['single_text'])){
						$go = TRUE;
					}else{
						$text = '"Answer" box MUST be empty!';
					}
				}
				break;
			case '4':
				//dd($input);
				break;			
		}

		if($go){
			$newQuestion = Question::create($input);
			$newQuestion->code = $input['code'];
			$parentQuiz = Quiz::where('id', '=', $id)->first();
			$sum = $parentQuiz->questionsPoints;
			foreach ($sum as $row){ 
	        	$sumAll = $row['sum'];
	        }
			$parentQuiz->score = $sumAll + $newQuestion->points ;
			if(isset($checks) && $checks == 1){
				$newQuestion->question_type_id = 2;
			}
			$newQuestion->save();
		    $parentQuiz->save();
			$file = Request::file('question_image');
			if(!is_null($file) && $file->isValid()) {
				$extension = $file->getClientOriginalExtension();
				$destinationPath = 'uploads';
				$file->move($destinationPath, $file->getClientOriginalName());
				$newQuestion->question_image = $destinationPath.'/'.$file->getClientOriginalName();
				$newQuestion->save();
			}
			$newQuestion->quiz()->attach($id);		

			switch ($newQuestion->question_type_id) {
				case '1':		
						for ($i=0; $i < $answers; $i++) {
							$newAnswer = new Answer;
							$newAnswer->question_id = $newQuestion->id;
							$newAnswer->answer = $input['multi_text'][$i];
							$newAnswer->correct = $input['multi_value'][$i];
							$newAnswer->save();
						}						
					break;
				case '2':
						for ($i=0; $i < $answers; $i++) {
							$newAnswer = new Answer;
							$newAnswer->question_id = $newQuestion->id;
							$newAnswer->answer = $input['single_text'][$i];
							$newAnswer->correct = ($i == (int)$correctAnswer)?1:0;
							$newAnswer->save();	
						}					
					break;
				case '3':
						$newAnswer = new Answer;
						$newAnswer->question_id = $newQuestion->id;
						$newAnswer->answer = $input['single_text'];
						$newAnswer->correct = 1;
						$newAnswer->save();	
					break;
				case '4':
					//dd($input);
					break;			
			}
	    	return redirect('questions/'.$id);

		}else{
			return redirect()->back()->withErrors(['text' => $text]);
		}

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
		if(!in_array(19, $this->privsArray))
			return redirect()->back();
		$types = Question_type::lists('type', 'id');
		$question = Question::find($id);
		$answer_counter = $question->answers->count();
		return view('questions.edit_question', compact('question', 'types', 'answer_counter', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Req $request)
	{
		$this->validate($request, [
	        'points' => 'required|numeric',
	        'question' => 'required',
	        'question_type_id' => 'required',

		]);

		$input = Request::all();

		$question = Question::find($id);
		$question->question = $input['question'];		
		$question->points = $input['points'];
		//$question->header_text = $input['header_text'];
		//$question->footer_text = $input['footer_text'];
		$question->code = $input['code'];
		$question->question_type_id = $input['question_type_id'];

		$file = Request::file('question_image');
		if(!is_null($file) && $file->isValid()) {
			$extension = $file->getClientOriginalExtension();
			$destinationPath = 'uploads';
			$file->move($destinationPath, $file->getClientOriginalName());
			$question->question_image = $destinationPath.'/'.$file->getClientOriginalName();
		}

		//$question->quiz()->attach($id);
		switch ($input['question_type_id']) {
			case '1':
				$go = FALSE;
				$text = '';
				if(isset($input['multi_text'])) {
					$answers = count($input['multi_text']);
					$answersText = 0;
					$checks = 0;
					for ($i=0; $i < $answers; $i++) {
						if(!empty($input['multi_text'][$i])){
							$answersText++;
						}
						if(!empty($input['multi_value'][$i])){
							$checks++;
						}
					}

					if($answersText == $answers && $checks > 1){
						$go = TRUE;
					}else{
						if($answersText != $answers){
							$text .= 'One of "Answers" boxes is empty!';
						}
						if($checks == 0){
							$text .= ' All of "Correct" boxes are empty!';
						}
						if($checks == 1){
							$text .= ' At least two of "Correct" boxes MUST be checked, OR choose "One Answer(Radio)"!';
						}
					}
				}else{
					$text = 'All of "Answers" boxes are empty!';
				}

				break;
			case '2':
				$go = FALSE;
				$text = '';
				if(isset($input['single_text']) && isset($input['single_value'])) {
					$answers = count($input['single_text']);
					$correctAnswer = $input['single_value'];
					$hasValue = FALSE;
					$answersText = 0;
					for ($i=0; $i < $answers; $i++) {
						if(!empty($input['single_text'][$i])){
							$answersText++;
						}
						$hasValue = TRUE;				
					}
					if($answersText == $answers && $hasValue){
						$go = TRUE;
					}else{
						$text = 'At least one of "Answers" boxes is empty. Do the right thing, please.';

					}
				}else{
					$text = 'All "Answers" boxes are empty and/or all of "Correct" boxes are empty. Do the right thing, please.';
				}
				break;
			case '3':
				$go = FALSE;
				$text = '';
				if(isset($input['single_text'])) {
					if(empty($input['single_text'])){
						$go = TRUE;
					}else{
						$text = '"Answer" box MUST be empty!';
					}
				}
				break;
			case '4':
				$go = FALSE;
				$text = 'Feature not implemented yet. Choose another type of questions, please';
				//dd($input);
				break;			
		}

		if($go){

			$question->save();
			$question->answers()->delete();

			$quiz = $question->quiz;
			foreach ($quiz as $row){ 
	        	$quizId = $row['id'];
	        	break;
	        }

			$parentQuiz = Quiz::find($quizId);
			$sum = $parentQuiz->questionsPoints;
			foreach ($sum as $row){ 
	        	$sumAll = $row['sum'];
	        }
			$parentQuiz->score = $sumAll - $request->points + $question->points;
		    $parentQuiz->save();

		    switch ($question->question_type_id) {
				case '1':		
						for ($i=0; $i < $answers; $i++) {
							$newAnswer = new Answer;
							$newAnswer->question_id = $question->id;
							$newAnswer->answer = $input['multi_text'][$i];
							$newAnswer->correct = $input['multi_value'][$i];
							$newAnswer->save();
						}						
					break;
				case '2':
						for ($i=0; $i < $answers; $i++) {
							$newAnswer = new Answer;
							$newAnswer->question_id = $question->id;
							$newAnswer->answer = $input['single_text'][$i];
							$newAnswer->correct = ($i == (int)$correctAnswer)?1:0;
							$newAnswer->save();
						}					
					break;
				case '3':
						$newAnswer = new Answer;
						$newAnswer->question_id = $question->id;
						$newAnswer->answer = $input['single_text'];
						$newAnswer->correct = 1;
						$newAnswer->save();
					break;
				case '4':
					//dd($input);
					break;			
			}

			return redirect('questions/'.$quizId);
		}else{
			return redirect()->back()->withErrors(['text' => $text]);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(!in_array(20, $this->privsArray))
			return redirect()->back();
		$question = Question::find($id);

		$quiz = $question->quiz;
		foreach ($quiz as $row){ 
        	$quizId = $row['id'];
        }
		$parentQuiz = Quiz::where('id', '=', $quizId)->first();
		$sum = $parentQuiz->questionsPoints;
		foreach ($sum as $row){ 
        	$sumAll = $row['sum'];
        }
		$parentQuiz->score = $sumAll - $question->points ;

	    $question->delete();
	    $parentQuiz->save();

		return redirect()->back();
	}

}
