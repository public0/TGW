@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.new_quiz') }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'quizz/store', 'method' => 'PUT']) !!}
				<div class="form-group">
					<?php echo $errors->first('category_id','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('category_id', Lang::get('messages.category')) !!}

					{!! Form::select('category_id', $categories, null, ['class' => 'form-control']); !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('score_junior','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('score_junior', Lang::get('messages.junior_score')) !!}

					{!! Form::text('score_junior', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('score_mid','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('score_mid', Lang::get('messages.mid_score')) !!}

					{!! Form::text('score_mid', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('score_senior','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('score_senior', Lang::get('messages.senior_score')) !!}

					{!! Form::text('score_senior', null, ['class' => 'form-control']) !!}
				</div>
				<div id="new_intern_quiz">
					<div class="form-group">
						<?php echo $errors->first('from','<div class="alert alert-danger" role="alert">
	  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  					<span class="sr-only">Error:</span>:message</div>'); ?>					
						{!! Form::label('from', Lang::get('messages.from')) !!}

						{!! Form::text('from', '0000-00-00', ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						<?php echo $errors->first('to','<div class="alert alert-danger" role="alert">
	  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  					<span class="sr-only">Error:</span>:message</div>'); ?>					
						{!! Form::label('to', Lang::get('messages.to')) !!}

						{!! Form::text('to', '0000-00-00', ['class' => 'form-control']) !!}
					</div>
				</div>				
				<div class="form-group">
					<?php echo $errors->first('name','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('name', 'Name') !!}

					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('time','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('time', Lang::get('messages.time')) !!}

					{!! Form::text('time', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('description','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('description', Lang::get('messages.description')) !!}

					{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2]) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('intro','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('intro', Lang::get('messages.intro')) !!}

					{!! Form::textarea('intro', null, ['class' => 'form-control', 'rows' => 3]) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('show_intro','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('show_intro', Lang::get('messages.show_intro')) !!}

					{!! Form::checkbox('show_intro', 1, false, ['class' => '']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit(Lang::get('messages.add'), ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
				<div class="panel-body">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
