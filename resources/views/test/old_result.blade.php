@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $quiz->name }}</div>
					<table class="table table-striped">
					    <tbody>
					    	<?php $i = 1; ?>
					    	@foreach($quiz->questions as $question)
					    		<tr>
					    			<td><span class="label label-default">{{Lang::get('messages.question')}} {{$i}}:</span> {{ $question->question }}</td>
					    		</tr>
								@if(!empty($question->code))
									<tr>
										<td>									
											<code> <?= nl2br(trim($question->code)) ?> </code>
										</td>
									</tr>
								@endif

					    		<?php $z = 1; ?>
					    		@foreach($question->given_answers()->where('assignement_id', $assignement->id)->get() as $answer)
					    		<tr>
					    			@if($question->question_type_id == 3)
						    			<td><span class="label label-default">{{Lang::get('messages.answer')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						    			<hr>
						    			{{$answer->answer}}
						    			<hr>
										{{ Lang::get('messages.points')}}: {{$question->points}} 
										{!! Form::open(['url' => 'test/save_points', 'method' => 'POST', 'id' => 'test_form']) !!}

										{!! Form::hidden("question_id", $question->id) !!}
										{!! Form::hidden("assignement_id", $assignement->id) !!}
										{!! Form::hidden("quiz_id", $quiz->id) !!}
										{!! Form::hidden("user_id", $uid) !!}
										{!! Form::text("points", $answer->points, ['data-question' => $question->id, 'data-assignement' => $assignement->id]) !!}
										{!! Form::button(Lang::get('messages.save'), ['class' => 'btn label-success save_points', 'data-question' => $question->id, 'id' => $z]) !!}
										<span class="label"></span>
										{!! Form::close() !!}
						    			</td>
					    			@else
					    			<td>
										@if(!empty($question->code))
											<code><?=$question->code?></code>
											<hr>
										@endif
					    				<span class="label {{($answer->related_answer->correct)?'label-success':'label-danger'}}">
					    					{{Lang::get('messages.answer')}} {{$z}}:&nbsp;&nbsp;
					    				</span>&nbsp; {{ $answer->related_answer->answer }}
					    			</td>
					    			@endif
					    		</tr>
					    		<?php $z++; ?>
					    		@endforeach
					    		<?php $i++; ?>
					    	@endforeach
					    </tbody>
					</table>
				<div class="panel-body">
					{!! Form::open(['method' => 'POST', 'id' => 'test_form']) !!}
					<div class="form-group">
						<?php echo $errors->first('reason','<div class="alert alert-danger" role="alert">
	  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  					<span class="sr-only">Error:</span>:message</div>'); ?>					
						{!! Form::label('reason', Lang::get('messages.comment')) !!}

						{!! Form::textarea('reason', $user_quiz->reason, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::submit(Lang::get('messages.comment'), ['class' => 'btn btn-primary form-control']) !!}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
