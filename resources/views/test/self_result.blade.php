@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-center">{{ Lang::get('messages.job') }}</th>
							<th class="text-center">{{ Lang::get('messages.quiz') }}</th>
							<th class="text-center">{{ Lang::get('messages.points') }}</th>
						</tr>
					</thead>
					<tbody>
					@foreach($assignements as $assignement)
						<tr>
							<td class="text-center">{{ $assignement->job->title }}</td>
							<td class="text-center">
								@foreach($assignement->quizzes as $quiz )
									{{ $quiz->quiz->name }}<br>
								@endforeach
							</td>
							<td class="text-center">
								@foreach($assignement->quizzes as $quiz )
									@if($score[$quiz->id])
									{{ round(($quiz->mark / $score[$quiz->id]) * 100, 1) }}%<br>
									@endif
								@endforeach
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="alert alert-warning" role="alert">*{{ Lang::get('messages.free_text_att') }}</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
