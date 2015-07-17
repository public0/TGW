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
					        	<th>{{ Lang::get('messages.short_number') }}</th>
					            <th>{{ Lang::get('messages.question') }}</th>
					            <th>{{ Lang::get('messages.type') }}</th>
					            <th>{{ Lang::get('messages.points') }}</th>
					           
					        </tr>
					    </thead>
					    <tbody>
					    	<?php $total = 0; ?>
					    	<?php $ii = 0; ?>
							@foreach ($quiz->questions as $question)
								<?php $ii++; ?>
								<?php $total += $question->points; ?>
							    <tr>
							    	<td>{!! $ii !!}</td>
							    	<td>{!! $question->question !!}</td>
							    	<td>{{ $question->question_type->type }}</td>
							    	<td>{{ $question->points }}</td>
							    </tr>
							@endforeach
					    </tbody>
					    <tfoot>
					        <tr>
					            <th>{{ '' }}</th>
					            <th>{{ '' }}</th>
					            <th>{{ 'Total:' }}</th>
					            <th>{{ $total }}</th>
					        </tr>
					    </tfoot> <!-- -->
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
