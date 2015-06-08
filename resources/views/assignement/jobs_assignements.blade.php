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
					<table id="assignment_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.job') }}</th>
					            <th class="text-center">{{ Lang::get('messages.period') }}</th>
					            <th class="text-left">{{ Lang::get('messages.quizzes') }}</th>
					        </tr>
					    </thead>
					    <tbody>
							@foreach ($assignements as $assignement)
					    		<?php 
						    		$officersArr = [];
									$show = TRUE; 
								?>
								@if(isset($assignement->job->title))
									@if(empty($assignement->quizzes->toArray()) && $user->user_type_id == 4 && !empty($uCat))
										<?php $show = FALSE; ?>
									@endif
							    	@foreach($assignement->quizzes as $quiz)
							    		@if($user->user_type_id == 4 && !empty($uCat))
							    			@if(in_array($quiz->quiz->category->id, $uCat))
							    				<?php $show = TRUE; ?>	
							    			@endif
							    		@else
							    		<?php $show = TRUE; ?>
							    		@endif
									@endforeach
									@if(in_array($user->user_type_id, [3, 8]))
										@if($assignement->job->officers)
											@foreach($assignement->job->officers as $officer)
												<?php $officersArr[] = $officer->id; ?> 
											@endforeach
											@if(in_array($user->id,$officersArr))
												<?php $show = TRUE; ?>
											@else
												<?php $show = FALSE; ?>
											@endif
										@endif
									@endif
									@if($show)
									    <tr>
									    	<td class="text-center">{{ $assignement->job->title }} 
									    	</td>
									    	<td class="text-center">{{ explode(' ', $assignement->job->start_at)[0] }} - {{ explode(' ', $assignement->job->end_at)[0] }}</td>
									    	<td class="text-left">
										    	@foreach($assignement->quizzes as $quiz)
										    		@if($user->user_type_id == 4 && !empty($uCat))
											    		@if(in_array($quiz->quiz->category->id, $uCat))
											    		<a href="{{ url('quiz_assignments/'.$assignement->id.'/'.$quiz->quiz_id) }}">{{  Lang::get($quiz->quiz->name) }}</a><br>
											    		@endif
										    		@elseif($user->user_type_id == 4 && empty($uCat))
											    		<a href="{{ url('quiz_assignments/'.$assignement->id.'/'.$quiz->quiz_id) }}">{{  Lang::get($quiz->quiz->name) }}</a><br>								    		
											    	@else 
											    		<a href="{{ url('quiz_assignments/'.$assignement->id.'/'.$quiz->quiz_id) }}">{{  Lang::get($quiz->quiz->name) }}</a><br>								    		
										    		@endif
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
