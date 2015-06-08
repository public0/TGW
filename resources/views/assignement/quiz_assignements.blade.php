@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h4 class="pull-left"><h4 class="pull-left">{{ Lang::get('links.show_assignements') }}</h4>
				{!! Form::open(['method' => 'GET', 'class' => 'pull-right']) !!}
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
					<table id="quiz_assignment_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.job') }}</th>
					            <th class="text-center">{{ Lang::get('messages.quiz') }}</th>
					            <th class="text-center">{{ Lang::get('messages.user') }}</th>
					            <th class="text-center">{{ Lang::get('messages.started_at') }}</th>
					            <th class="text-center col-md-2">{{ Lang::get('messages.pass_score') }}</th>
					            <th class="text-center">{{ Lang::get('messages.score') }}</th>
					            <th class="text-left">{{ Lang::get('messages.quizzes') }}</th>
					            <th class="text-center">{{ Lang::get('messages.actions') }}</th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    		$z = 1;
				    			$i = 1;
				    			$job = [];
				    			$best_score = [];
					    	?>
							@foreach ($assignements as $assignement)
								@if (isset($assignement->user->name))
									@if(isset($assignement->quizzes))
								    	@foreach($assignement->quizzes as $quiz)
								    	<?php
								    		$candidates_number = $assignement->job->candidates;
										    if(array_key_exists($assignement->job->id, $job)) {
										    	$i = $job[$assignement->job->id];
										    	$job[$assignement->job->id] = $job[$assignement->job->id]+1;
/*										    	if() {
											    	$best_score[$assignement->job->id] = 
										    	}
*/										    } else {
										    	$i = 1;
									    		$job += [$assignement->job->id => $i];
										    }
								    	?>
										    <tr>
										    	<td class="text-center">{{ $assignement->job->title }} ({{$assignement->job->candidates}})
										    	<!-- <hr> -->
										    	<?//= var_dump($job); ?>
										    	</td>
										    	<td class="text-center">
										    	 {{ $quiz->quiz->name}}
										    	</td>

										    	<td class="text-center">
										    	@if(!empty($assignement->user->name))
										    		{{ $assignement->user->name }} {{ $assignement->user->surname }}
										    	@else
										    		{{ $assignement->user->login }}
										    	@endif
										    	</td>
										    	<td class="text-center">
										    		@if(isset($assignement->started_at))
										    			{{ ($assignement->started_at != '0000-00-00 00:00:00')?$assignement->started_at:Lang::get('messages.not_started') }}
										    		@endif
										    	</td>
										    	<td class="text-left">
										    		<div class="row-fluid">
											    		<div class="span4"><small>{{ Lang::get('messages.junior') }}: {{ $quiz->quiz->score_junior }}%</small></div>
										    		</div>
										    		<div class="row-fluid">
											    		<div class="span4"><small>{{ Lang::get('messages.mid') }}: {{ $quiz->quiz->score_mid }}%</small></div>
											    	</div>
										    		<div class="row-fluid">
											    		<div class="span4"><small>{{ Lang::get('messages.senior') }}: {{ $quiz->quiz->score_senior }}%</small></div>
											    	</div>
										    	</td>
										    	<td class="text-center">
													@if($score[$quiz->id])
													{{ (!$quiz->done)?'0%': round(($quiz->mark / $score[$quiz->id]) * 100, 1).'%'}}<br>
													@endif
										    	</td>
										    	<td class="text-left">
										    		<a href="{{ url('results/'.$quiz->user_id.'/'.$assignement->id.'/'.$quiz->quiz_id) }}">{{  Lang::get($quiz->quiz->name) }}</a><br>
										    	</td>
												<td class="text-center">
													@if(in_array(16, $privsArray))
														{!! Form::open(['url' => 'assignment/delete/'.$assignement->id.'/'.$quiz->quiz->id, 'method' => 'DELETE', 'class' => 'confirm']) !!}
															{!! Form::submit(Lang::get('messages.delete'), ['class' => 'btn-sm label-danger']) !!}
														{!! Form::close() !!}
													@endif
												</td>
										    </tr>
										    <?php 
										    $i++;
										    $z++;
										    ?>
								    @endforeach
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
