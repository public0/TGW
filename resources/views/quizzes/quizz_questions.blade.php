@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $quiz->name }} {{ Lang::get('messages.questions') }}
				<span class="button button-default pull-right">
					<a href="{{ url('question/create/'.$quiz->id) }}">{{ Lang::get('messages.add') }}</a>
				</span>

				</div>
				<div class="panel-body">
					<table id="quiz_questions_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th>{{ Lang::get('messages.question') }}</th>
					            <th>{{ Lang::get('messages.type') }}</th>
					            <th>{{ Lang::get('messages.points') }}</th>
					            <th>{{ Lang::get('messages.actions') }}</th>
					        </tr>
					    </thead>
					    <tbody>
							@foreach ($quiz->questions as $question)
							    <tr>
							    	<td>{!! $question->question !!}</td>
							    	<td>{{ $question->question_type->type }}</td>
							    	<td>{{ $question->points }}</td>
							    	<td>
								    	<ul class="list-inline">
											@if(in_array(19, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'question/edit/'.$question->id, 'method' => 'GET']) !!}
													{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
												{!! Form::close() !!}
								    		</li>
								    		@endif
											@if(in_array(20, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'question/delete/'.$question->id, 'method' => 'DELETE']) !!}
													{!! Form::submit(Lang::get('messages.delete'), ['class' => 'btn-sm label-danger']) !!}
												{!! Form::close() !!}							    			
								    		</li>
								    		@endif
								    	</ul>
							    	</td>
							    </tr>
							@endforeach
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
