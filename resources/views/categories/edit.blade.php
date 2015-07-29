@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.new_category') }} - {{ $category->name }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'categories/update/'.$category->id]) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name') !!}

					{!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit(Lang::get('messages.submit'), ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
