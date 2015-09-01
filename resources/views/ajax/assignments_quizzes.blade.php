@foreach($job_quiz as $user_quiz) 
	@if($row->show)
		@if($user->user_type_id == 4 && !empty($uCat))
			@if(in_array($user_quiz->quiz->category->id, $uCat) || $user->id == $user_quiz->user_id)
			<a href="{{ url('quiz_assignments/'.$row->id.'/'.$user_quiz->quiz->id) }}">{{  Lang::get($user_quiz->quiz->name) }}</a><br>
			@endif
		@elseif($user->user_type_id == 4 && empty($uCat) || $user->id == $user_quiz->user_id)
			<a href="{{ url('quiz_assignments/'.$row->id.'/'.$user_quiz->quiz->id) }}">{{  Lang::get($user_quiz->quiz->name) }}</a><br>
		@else 
			<a href="{{ url('quiz_assignments/'.$row->id.'/'.$user_quiz->quiz->id) }}">{{  Lang::get($user_quiz->quiz->name) }}</a><br>
		@endif
	@endif
@endforeach
