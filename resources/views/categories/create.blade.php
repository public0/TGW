@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.new_category') }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'categories/store', 'method' => 'PUT']) !!}
				<div class="form-group">
					<?php echo $errors->first('name','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('name', 'Name') !!}

					{!! Form::text('name', null, ['class' => 'form-control']) !!}
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
