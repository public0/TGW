@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.new_user') }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'user/store', 'method' => 'PUT']) !!}
				<div class="form-group">
					<?php echo $errors->first('user_type_id','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('user_type_id', Lang::get('messages.type')) !!}

					{!! Form::select('user_type_id', $types, null, ['class' => 'form-control']); !!}
				</div>
				<div class="form-group" id="cats" style="display: none;">
					<?php echo $errors->first('user_type_id','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('category', Lang::get('messages.categories')) !!}

					{!! Form::select('category', $categories, null, ['class' => 'form-control', 'multiple']); !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('name','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('name', Lang::get('messages.name')) !!}

					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('surname','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('surname', Lang::get('messages.surname')) !!}

					{!! Form::text('surname', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('login','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('login', Lang::get('messages.login')) !!}

					{!! Form::text('login', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('email','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('email', Lang::get('messages.email')) !!}

					{!! Form::text('email', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('phone','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('phone', Lang::get('messages.phone')) !!}

					{!! Form::text('phone', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('heramus_link','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('heramus_link', Lang::get('messages.heramus_link')) !!}

					{!! Form::text('heramus_link', null, ['class' => 'form-control']) !!}
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
