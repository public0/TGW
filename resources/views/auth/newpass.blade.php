@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('messages.change_password') }}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif				
				{!! Form::open(['url' => 'auth/reset']) !!}
				<div class="form-group">
					{!! Form::label('password', Lang::get('messages.new_password')) !!}

					{!! Form::password('password', ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('confirm_password', Lang::get('messages.confirm_password')) !!}

					{!! Form::password('confirm_password', ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit(Lang::get('messages.save'), ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
