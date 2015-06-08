@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="pull-left">{{ Lang::get('links.users') }}</h4>
				{!! Form::open(['url' => 'users', 'method' => 'GET', 'class' => 'pull-right']) !!}
					{!! Form::text('q', null, ['class' => '']) !!}
					{!! Form::submit(Lang::get('messages.search'), ['class' => 'btn-sm label-info']) !!}
				{!! Form::close() !!}
				<br>
				<br>
				</div>

				<div class="panel-body">
					<table id="users_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.type') }}</th>
					            <th class="text-center">{{ Lang::get('messages.name') }}</th>
					            <th class="text-center">{{ Lang::get('messages.login') }}</th>
					            <th class="text-center">{{ Lang::get('messages.email') }}</th>
					            <th class="text-center">{{ Lang::get('messages.actions') }}</th>
					        </tr>
					    </thead>
					    <tbody>
							@foreach ($users as $user)
							    <tr>
							    	<td class="text-center">{{ $user->type->type }} </td>
							    	<td class="text-center">{{ $user->name }} {{ $user->surname }}</td>
							    	<td class="text-center">{{ $user->login }}</td>
							    	<td class="text-center">{{ $user->email }}</td>
							    	<td class="text-center">
								    	<ul class="list-inline">
											@if(in_array(26, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'privileges/'.$user->id.'/edit', 'method' => 'GET']) !!}
													{!! Form::submit(Lang::get('messages.privileges'), ['class' => 'btn-sm label-info']) !!}
												{!! Form::close() !!}
								    		</li>
								    		@endif
											@if(in_array(11, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'user/edit/'.$user->id, 'method' => 'GET']) !!}
													{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
												{!! Form::close() !!}
								    		</li>
								    		@endif
											@if(in_array(12, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'user/delete/'.$user->id, 'method' => 'DELETE' ,'class' => 'confirm']) !!}
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
					<div class="row text-center">
						<?php echo $users->render(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
