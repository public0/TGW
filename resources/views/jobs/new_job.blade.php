@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.new_job') }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'job/store', 'method' => 'PUT']) !!}
				<div class="form-group">
					<div class="checkbox checkbox-success">
						{!! Form::hidden('status', 0) !!}
						{!! Form::checkbox('status', 1, true, ['class' => 'styled', 'id' => 'status']) !!}
						{!! Form::label('status', Lang::get('messages.status').': '.Lang::get('messages.opened'), ['class' => '']) !!}
					</div>
				</div>
				<div class="form-group">
					<?php echo $errors->first('start_at','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('start_at', Lang::get('messages.start_at')) !!}

					{!! Form::text('start_at', NULL, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('end_at','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('end_at', Lang::get('messages.end_at')) !!}

					{!! Form::text('end_at', NULL, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('title','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('title', Lang::get('messages.title')) !!}
					{!! Form::text('title', null, ['class' => 'form-control']) !!}
				</div>
					
					<div class="form-group">
					<?php echo $errors->first('notified','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('notified', Lang::get('messages.emails')) !!}
					{!! Form::text('notified', null, ['class' => 'form-control', 'placeholder' => 'example@vauvan.ro;example2@vauvan.ro']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('quizzes','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('quizzes', Lang::get('messages.quizzes')) !!}
					{!! Form::select('quizzes', $quizzes, null, ['class' => 'form-control', 'multiple']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('job_officer','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('job_officer', Lang::get('messages.officers')) !!}
					{!! Form::select('job_officer', $officers, null, ['class' => 'form-control', 'multiple']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('description', Lang::get('messages.description')) !!}
					{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('candidates','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('candidates', Lang::get('messages.candidates')) !!}
					{!! Form::text('candidates', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit(Lang::get('messages.add'), ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
