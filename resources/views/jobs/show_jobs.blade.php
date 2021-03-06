@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h4 class="pull-left">{{ Lang::get('messages.jobs') }}</h4>
				<br>
				<br>
				</div>
				<div class="panel-body">
					<table id="jobs_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.title') }}</th>
					            <th class="text-center">{{ Lang::get('messages.candidates') }}</th>
					            <th class="text-center">{{ Lang::get('messages.status') }}</th>
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
