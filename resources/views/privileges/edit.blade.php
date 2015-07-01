@extends('app')

@section('content')
<?php
$disabled = '';
if(!in_array(27, $privsArray)) {
	$disabled = 'disabled';
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('messages.privileges') }} <span class="selectAll">{{ Lang::get('messages.select_all') }} {!! Form::checkbox('permission',1,true,['class' => 'select'])!!}</span></div>
				<div class="panel-body">
					<table class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.privilege') }}</th>
					            <th class="text-center">{{ Lang::get('links.create') }}</th>
					            <th class="text-center">{{ Lang::get('links.read') }}</th>
					            <th class="text-center">{{ Lang::get('links.update') }}</th>
					            <th class="text-center">{{ Lang::get('links.delete') }}</th>
					           
					        </tr>
					    </thead>
					    <tbody>
						{!! Form::open(['url' => 'privileges/store', 'method' => 'PUT']) !!}
							{!! Form::hidden('user_id', $user->id) !!}

					    	<?php $currentPriv = ''; ?>
					    	
					    	@foreach($privileges as $privilege)
					    	@if(strcmp($currentPriv, $privilege->privilege) !== 0)
					    	<tr>
					    	<td>{{ $privilege->privilege }}</td>
					    	@endif
					    	<?php $currentPriv = $privilege->privilege; ?>
					    	@if(strcmp($currentPriv, $privilege->privilege) !== 0)
					    	<td>{{ strcmp($currentPriv, $privilege->privilege) }}</td>
					    	</tr>
					    	@endif
					    	<td class="text-center">
					    	{!! Form::hidden('privilege['.$privilege->id.']', 0) !!}
							{!! Form::checkbox('privilege['.$privilege->id.']', 1, (in_array($privilege->id, $userPrivilegesArray)?true:false), ['class' => 'permission'],[$disabled]) !!}
                           	</td>
					    	@endforeach
					    </tbody>
					</table>
					@if(in_array(27, $privsArray))
					<div class="form-group">
						{!! Form::submit(Lang::get('messages.save'), ['class' => 'btn btn-primary form-control']) !!}
					</div>
					@endif
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
