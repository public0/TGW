@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.edit_job') }} - {{ $job->title }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'job/update/'.$id, 'method' => 'POST']) !!}
				<div class="form-group">
					<div class="checkbox checkbox-success">
						{!! Form::hidden('status', 0) !!}
						{!! Form::checkbox('status', 1, ($job->status)?true:false, ['class' => 'styled', 'id' => 'status']) !!}
						@if($job->status)
						{!! Form::label('status', Lang::get('messages.status').': '.Lang::get('messages.opened')) !!}
						@else
						{!! Form::label('status', Lang::get('messages.status').': '.Lang::get('messages.closed')) !!}
						@endif
					</div>
				</div>
				<div class="form-group">
					<?php echo $errors->first('start_at','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('start_at', Lang::get('messages.start')) !!}

					{!! Form::text('start_at', explode(' ', $job->start_at)[0], ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">

					<?php echo $errors->first('end_at','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('end_at', Lang::get('messages.end')) !!}

					{!! Form::text('end_at', explode(' ',$job->end_at)[0], ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('title','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('title', Lang::get('messages.title')) !!}
					{!! Form::text('title', $job->title, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('notified','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('notified', Lang::get('messages.emails')) !!}
					{!! Form::text('notified', $job->notified, ['class' => 'form-control', 'placeholder' => 'example@vauvan.ro;example2@vauvan.ro']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('quizzes','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('quizzes', Lang::get('messages.quizzes')) !!}
					{!! Form::select('quizzes', $quizzes, $job->quizzes->lists('id'), ['class' => 'form-control', 'multiple']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('job_officer','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('job_officer', Lang::get('messages.officers')) !!}
					{!! Form::select('job_officer', $officers, $job->officers->lists('id'), ['class' => 'form-control', 'multiple']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('description', Lang::get('messages.description')) !!}
					{!! Form::textarea('description', $job->description, ['class' => 'form-control', 'rows' => '4']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('candidates','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('candidates', Lang::get('messages.candidates')) !!}
					{!! Form::text('candidates', $job->candidates, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
				<div class="panel-body">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
