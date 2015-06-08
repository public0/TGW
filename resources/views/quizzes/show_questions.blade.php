@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $quiz->name }} {{ Lang::get('messages.questions') }}
		         </div>
				<div class="panel-body">
					<table id="quiz_questions_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th>{{ Lang::get('messages.question') }}</th>
					            <th>{{ Lang::get('messages.type') }}</th>
					            <th>{{ Lang::get('messages.points') }}</th>
					           
					        </tr>
					    </thead>
					    <tbody>
							@foreach ($quiz->questions as $question)
							    <tr>
							    	<td>{!! $question->question !!}</td>
							    	<td>{{ $question->question_type->type }}</td>
							    	<td>{{ $question->points }}</td>
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
