@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="pull-left">{{ Lang::get('links.show_quiz') }}</h4>
				{!! Form::open(['url' => 'quizzes', 'method' => 'GET', 'class' => 'pull-right']) !!}
					{!! Form::text('q', null, ['class' => '']) !!}
					{!! Form::submit(Lang::get('messages.search'), ['class' => 'btn-sm label-info']) !!}
				{!! Form::close() !!}
				<br>
				<br>				
				</div>
				<div class="panel-body">
					<table id="quizzes_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.category') }}</th>
					            <th class="text-center">{{ Lang::get('messages.name') }}</th>
					            <th class="text-center">{{ Lang::get('messages.date') }}</th>
					            <th class="text-center">{{ Lang::get('messages.questions') }}</th>
					            <th class="text-center">{{ Lang::get('messages.actions') }}</th>
					        </tr>
					    </thead>
					    <tbody>
					    	@if($user->user_type_id == 4)
						    	@if(isset($quizzes) && !empty($quizzes))
									@foreach ($quizzes as $quiz)
										@if(in_array($quiz->category['id'], $uCat))
										    <tr>
										    	<td class="text-center">{{ $quiz->category['name']}}</td>
										    	<td class="text-center">{{ $quiz->name }}</td>
										    	<td class="text-center">{{ $quiz->updated_at }}</td>
										    	<td class="text-center">
													@if(in_array(18, $privsArray))
													{!! Form::open(['url' => 'questions/'.$quiz->id, 'method' => 'GET']) !!}
														{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
													{!! Form::close() !!}
													@endif
										    	</td>
										    	<td class="text-center">
											    	<ul class="list-inline">
														@if(in_array(7, $privsArray))
											    		<li>
															{!! Form::open(['url' => 'quizz/edit/'.$quiz->id, 'method' => 'GET']) !!}
																{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
															{!! Form::close() !!}
											    		</li>
											    		@endif
														@if(in_array(8, $privsArray))
											    		<li>
															{!! Form::open(['url' => 'quizz/delete/'.$quiz->id, 'method' => 'DELETE']) !!}
																{!! Form::submit(Lang::get('messages.delete'), ['class' => 'btn-sm label-danger']) !!}
															{!! Form::close() !!}							    			
											    		</li>
											    		@endif
											    	</ul>
										    	</td>
										    </tr>
										@endif
									@endforeach
								@endif
							@else
						    	@if(isset($quizzes) && !empty($quizzes))
						    	 <tr>	
									@foreach ($quizzes as $quiz)
                                      <?php $quizJobs = FALSE; ?>
                                     @foreach($quiz->jobs as $qj)
									@if (!empty($qj->assigned->toArray()))
									<?php  $quizJobs=TRUE;?>
                                    @endif
									@endforeach
									   
									    	<td class="text-center">{{ $quiz->category['name']}}</td>
									    	<td class="text-center">{{ $quiz->name }}</td>
									    	<td class="text-center">{{ $quiz->updated_at }}</td>
									    	<td class="text-center">
									    		@if( !$quizJobs)
													@if(in_array(18, $privsArray))
													{!! Form::open(['url' => 'questions/'.$quiz->id, 'method' => 'GET']) !!}
														{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
													{!! Form::close() !!}
													@endif
												 @else
													{!! Form::open(['url' => 'questions/show_questions/'.$quiz->id, 'method' => 'GET']) !!}
														{!! Form::submit(Lang::get('messages.view'), ['class' => 'btn-sm label-info']) !!}
													{!! Form::close() !!}
												@endif	

									    	</td>
									    	<td class="text-center">
										    	<ul class="list-inline">
													@if(in_array(7, $privsArray))
										    		<li>
														{!! Form::open(['url' => 'quizz/edit/'.$quiz->id, 'method' => 'GET']) !!}
															{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
														{!! Form::close() !!}
										    		</li>
										    		@endif
										    		@if( !$quizJobs)
														@if(in_array(8, $privsArray))
										    			<li>
															{!! Form::open(['url' => 'quizz/delete/'.$quiz->id, 'method' => 'DELETE']) !!}
																{!! Form::submit(Lang::get('messages.delete'), ['class' => 'btn-sm label-danger']) !!}
															{!! Form::close() !!}							    			
										    			</li>
										    			@endif
										    		@endif
										    	</ul>
									    	</td>
									    </tr>
									@endforeach
								@endif
							@endif
					    </tbody>
					</table>
					<div class="row text-center">
						<?php //echo $quizzes->render(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
