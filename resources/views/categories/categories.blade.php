@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>{{ Lang::get('links.categories') }}</h4></div>

				<div class="panel-body">
					<table id="categories_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.name') }}</th>
					            <th class="text-center">{{ Lang::get('messages.technicians') }}</th>
					            <th class="text-center">{{ Lang::get('messages.quizzes') }}</th>
					            <th class="text-center">{{ Lang::get('messages.actions') }}</th>
					        </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
