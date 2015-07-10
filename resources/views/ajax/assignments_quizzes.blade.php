@foreach($row->quizzes as $quiz)
	@if($row->show)
		@if($user->user_type_id == 4 && !empty($uCat))
			@if(in_array($quiz->quiz->category->id, $uCat) || $user->id == $quiz->quiz->user_id)
			<a href="{{ url('quiz_assignments/'.$row->id.'/'.$quiz->quiz_id) }}">{{  Lang::get($quiz->quiz->name) }}</a><br>
			@endif
		@elseif($user->user_type_id == 4 && empty($uCat) || $user->id == $quiz->quiz->user_id)
			<a href="{{ url('quiz_assignments/'.$row->id.'/'.$quiz->quiz_id) }}">{{  Lang::get($quiz->quiz->name) }}</a><br>								    		
		@else 
			<a href="{{ url('quiz_assignments/'.$row->id.'/'.$quiz->quiz_id) }}">{{  Lang::get($quiz->quiz->name) }}</a><br>								    		
		@endif
	@endif
@endforeach
