<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Request;
use App\Quiz;
use App\Category;
use Auth;

class QuizController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if(!in_array(6, $this->privsArray))
			return redirect()->back();
		$search = $request->all();
		$quizzes = NULL;
		$user = Auth::user(); 

		$userCategories = $user->categories;
		$uCat = [];
		foreach ($userCategories as $userCategory) {
			$uCat[] = $userCategory->id;
		}

		if($search && !empty($search['q'])) {
			$quizzes = Quiz::whereRaw('name LIKE ? OR description LIKE ?', ['%'.$search['q'].'%','%'.$search['q'].'%'])->paginate(10);
		} else {
/*			$quizzes = Quiz::paginate(10);*/
			$quizzes = Quiz::get();
		}
		return view('quizzes.show_quizzes', compact('quizzes', 'user', 'uCat'));
	}

	/**
	 * Display questions for specified quizz.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function quizz_questions($id)
	{
		$quiz = Quiz::find($id);
		return view('quizzes.quizz_questions', compact('quiz', 'id', 'search'));
	}
	
	public function show_questions($id)
	{
		$quiz = Quiz::find($id);
		return view('quizzes.show_questions', compact('quiz', 'id', 'search'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!in_array(5, $this->privsArray))
			return redirect()->back();
		$categories = [ 0 => \Lang::get('messages.select')];
		$categories += Category::lists('name','id');
		return view('quizzes.new_quiz', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
				'category_id' => 'exists:categories,id',
		        'name' => 'required|max:255',
		        'time' => 'required|numeric',
		        'score_junior' => 'required|numeric',
		        'score_mid' => 'required|numeric',
		        'score_senior' => 'numeric',
		]);
		$input = $request->all();
		$input['score_junior'] = (int)$input['score_junior'];
		$input['score_mid'] = (int)$input['score_mid'];
		$input['score_senior'] = (int)$input['score_senior'];

		if($input['category_id'] == 1) {
			$this->validate($request, [
			        'from' => 'required',
			        'to' => 'required',
			]);
		}
		$newQuiz = Quiz::create($input);
		return redirect('quizzes');
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
		if(!in_array(7, $this->privsArray))
			return redirect()->back();
		$categories = Category::lists('name','id');
		$quiz = Quiz::find($id);
		$jj = $quiz->juniorQuestionsPoints()->get()->toArray();
		$jm = $quiz->midQuestionsPoints()->get()->toArray();
		$js = $quiz->seniorQuestionsPoints()->get()->toArray();
		$jq = $quiz->questionsPoints();
#		echo '<pre>';
#		var_dump($jj[0]['sum']);
#		var_dump($jm[0]['sum']);
#		var_dump($js[0]['sum']);
#		dd($jq->get()->toArray());
		return view('quizzes.edit_quiz', compact('categories','quiz','id'));
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
		        'name' => 'required|max:255',
		        'time' => 'required|numeric',
		        'score_junior' => 'required|numeric',
		        'score_mid' => 'required|numeric',
		        'score_senior' => 'numeric',
		]);
		$input = $request->all();
		if($input['category_id'] == 1) {
			$this->validate($request, [
			        'from' => 'required',
			        'to' => 'required',
			]);
		}
		$quiz = Quiz::find($id);
		$quiz->category_id = $input['category_id'];

		if($input['category_id'] == 1) {
			$quiz->from = $input['from'];
			$quiz->to 	= $input['to'];
		}
		$quiz->name = $input['name'];
		$quiz->time = $input['time'];

		$quiz->score_junior = $input['score_junior'];
		$quiz->score_mid = $input['score_mid'];
		$quiz->score_senior = $input['score_senior'];

		$quiz->description = $input['description'];
		$quiz->intro = $input['intro'];
		$quiz->show_intro = $input['show_intro'];
		$quiz->save();
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
		if(!in_array(8, $this->privsArray))
			return redirect()->back();
		$quiz = Quiz::find($id);
		$quiz->delete();		
		return redirect('quizzes');
	}

}
