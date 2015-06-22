@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.new_assignement') }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'assignement/store', 'method' => 'PUT']) !!}
				<div class="form-group">
					<?php echo $errors->first('assigned_job','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('assigned_job', Lang::get('messages.job')) !!}
					{!! Form::select('assigned_job', $jobs, null, ['class' => 'form-control']) !!}
				</div>
				<div id="userr">
					
					<div class="form-group">
						<?php echo $errors->first('assigned_users','<div class="alert alert-danger" role="alert">
	  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  					<span class="sr-only">Error:</span>:message</div>'); ?>					
						{!! Form::label('assigned_users', Lang::get('messages.user')) !!}
						{!! Form::select('assigned_users', $users, null, ['class' => 'form-control', 'multiple']) !!}
					</div>

				</div>
				<div class="form-group">
					{!! Form::submit(Lang::get('messages.add'), ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
