@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.new_report') }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'report/store', 'method' => 'PUT']) !!}
				<div class="form-group">
					<?php echo $errors->first('title','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('title', Lang::get('messages.title')) !!}
					{!! Form::text('title', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					<?php echo $errors->first('quizzes','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('quizzes', Lang::get('messages.quizzes')) !!}
					{!! Form::select('quizzes', $quizzes, null, ['class' => 'form-control', 'multiple']) !!}
				</div>
				<div class="form-group">
				{!! Form::label('', Lang::get('messages.report_score')) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('very_bad','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('very_bad', Lang::get('messages.very_bad')) !!}

					{!! Form::text('very_bad', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('bad','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('bad', Lang::get('messages.bad')) !!}

					{!! Form::text('bad', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('medium','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('medium', Lang::get('messages.medium')) !!}

					{!! Form::text('medium', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('good','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('good', Lang::get('messages.good')) !!}

					{!! Form::text('good', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('very_good','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('very_good', Lang::get('messages.very_good')) !!}

					{!! Form::text('very_good', null, ['class' => 'form-control']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::submit(Lang::get('messages.generate_report'), ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
