@extends('no_header')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $currentQuiz->name }}</div>

				<div class="panel-body">
					{!! Form::open(['url' => 'test/submit', 'method' => 'PUT', 'id' => 'test_form']) !!}
					{!! Form::hidden("quiz", $currentQuiz->id) !!}
					<div id="countdown" data-time="{{ $currentQuiz->time }}"></div>
					<table class="table table-striped">
					    <tbody>
					    	<?php $answerCounter = 0;?>
							@foreach ($currentQuiz->questions as $question)
							<tr>
								<td>{{ $question->question }}</td>
							</tr>
							<tr>
								<td> {{ $question->question_image }} </td>
							</tr>
							@if(!empty($question->question_image))
							<tr>
								<td><a href="{{asset('/'.$question->question_image)}}" class="my-show"><img class="img-responsive" src="{{asset($question->question_image)}}"></a></td>
							</tr>
							@endif
							@if(!empty($question->code))
							<tr>
								<td><code><?= nl2br($question->code) ?></code></td>
							</tr>
							@endif
							<tr>
								@if($question->question_type_id == 1)
								<td>
									@foreach($question->answers as $answer)
										{!! Form::checkbox("question[$question->id][]", $answer->id, false, ['class' => '']) !!}
										{!! Form::label("question[$question->id]", $answer->answer.' ', ['class' => '']) !!}
										<br>
									@endforeach
								</td>
								@elseif($question->question_type_id == 2)
								<td>
									@foreach($question->answers as $answer)
									{!! Form::radio("question[$question->id][]", $answer->id, false, ['class' => '']) !!}
									{!! Form::label('question[$question->id]', $answer->answer.' ', ['class' => '']) !!}
									<br>
									@endforeach
								</td>
								@elseif($question->question_type_id == 3)
								<td>
									{!! Form::textarea("question[$question->id]", null, ['class' => 'form-control']) !!}								
								</td>
								@elseif($question->question_type_id == 4)
								<td>{{ $question->answers }}</td>
								@endif
							</tr>
							<?php $answerCounter++; ?>
							@endforeach
							<tr>
								<td>{!! Form::submit(Lang::get('messages.done'), ['class' => 'btn btn-primary form-control']) !!}</td>
							</tr>
						</tbody>
					</table>
					{!! Form::close() !!}				
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
