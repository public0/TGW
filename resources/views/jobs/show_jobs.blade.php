@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h4 class="pull-left">{{ Lang::get('messages.jobs') }}</h4>
				{!! Form::open(['url' => 'jobs', 'method' => 'GET', 'class' => 'pull-right']) !!}
					{!! Form::text('q', null, ['class' => '']) !!}
					{!! Form::submit(Lang::get('messages.search'), ['class' => 'btn-sm label-info']) !!}
				{!! Form::close() !!}
				<br>
				<br>
				</div>
				<div class="panel-body">
					<table id="jobs_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.title') }}</th>
					            <th class="text-center">{{ Lang::get('messages.candidates') }}</th>
					            <!-- <th class="text-center">{{-- Lang::get('messages.description') --}}</th> -->
					            <th class="text-center">{{ Lang::get('messages.status') }}</th>
					            <th class="text-center">{{ Lang::get('messages.actions') }}</th>
					        </tr>
					    </thead>
					    <tbody>
							@foreach ($jobs as $job)
							    <tr>
							    	
							    	<td class="text-center">{{ $job->title }}</td>
							    	<td class="text-center">
								    @if($job->id != 1)
								    	{{ $job->candidates }}
								    @else
								    	{{ Lang::get('messages.interns') }}
								    @endif
							    	</td>
							    	<!-- <td class="text-center">{{-- $job->description --}}</td> -->
							    	<td class="text-center">
								    	<span class="label <?= ($job->status)?'label-success':'label-danger'?>">
							    		{{ ($job->status)?Lang::get('messages.opened'):Lang::get('messages.closed') }}
							    		</span>
							    	</td>
							    	<td class="text-center">
								    	<ul class="list-inline">
											@if(in_array(23, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'job/edit/'.$job->id, 'method' => 'GET']) !!}
													{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
												{!! Form::close() !!}
								    		</li>
								    		@endif
								    		@if($job->id != 1)
												@if(in_array(24, $privsArray))
									    		<li>
													{!! Form::open(['url' => 'job/delete/'.$job->id, 'method' => 'DELETE', 'class' => 'confirm']) !!}
														{!! Form::submit(Lang::get('messages.delete'), ['class' => 'btn-sm label-danger']) !!}
													{!! Form::close() !!}							    			
									    		</li>
									    		@endif
								    		@endif
								    	</ul>
							    	</td>
							    </tr>
							@endforeach
					    </tbody>
					</table>
					<div class="row text-center">
						<?php echo $jobs->render(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
