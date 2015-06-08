@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h4 class="pull-left"><h4 class="pull-left">{{ Lang::get('links.show_assignements') }}</h4>
				{!! Form::open(['url' => 'assignements', 'method' => 'GET', 'class' => 'pull-right']) !!}
					<ul class="list-inline">
						<li>
							{!! Form::select('s', [1=>Lang::get('messages.job'), 2=>Lang::get('messages.user')], (isset($search['s'])?$search['s']:1), ['class' => 'form-control']) !!}
						</li>
						<li>
							{!! Form::text('q', null, ['class' => '']) !!}
						</li>						
						<li>
							{!! Form::submit(Lang::get('messages.search'), ['class' => 'btn-sm label-info']) !!}					
						</li>
					</ul>
				{!! Form::close() !!}
				<br>
				<br>
				</div>
				<div class="panel-body">
					<table id="assignment_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.job') }}</th>
					            <th class="text-center">{{ Lang::get('messages.user') }}</th>
					            <th class="text-center">Grade</th>
					            <th class="text-left">{{ Lang::get('messages.quizzes') }}</th>
					        </tr>
					    </thead>
					    <tbody>
							@foreach ($assignements as $assignement)
								@if (is_object($assignement->user))
									@if(isset($assignement->job->title))
								    <tr>
								    	<td class="text-center">{{ $assignement->job->title }}</td>
								    	<td class="text-center">{{ $assignement->user->name }} {{ $assignement->user->surname }}</td>
								    	<td class="text-center">
											@foreach($assignement->quizzes as $quiz)
												@if($score[$quiz->id])
												{{ (!$quiz->done)?Lang::get('messages.not_finished'): round(($quiz->mark / $score[$quiz->id]) * 100, 1).'%'}}<br>
												@endif
											@endforeach
								    	</td>
								    	<td class="text-left">
								    	@foreach($assignement->quizzes as $quiz)
								    		<a href="{{ url('results/'.$quiz->user_id.'/'.$assignement->id.'/'.$quiz->quiz_id) }}">{{  Lang::get($quiz->quiz->name) }}</a><br>
								    	@endforeach
								    	</td>
								    </tr>
								@endif
							@endif
							@endforeach
					    </tbody>
					</table>
<!-- 					<div class="row text-center">
						<?php// echo $assignements->render(); ?>
					</div>
 -->				</div>
				<div class="panel-body">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
