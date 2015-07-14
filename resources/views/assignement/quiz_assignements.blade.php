@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
				<h4 class="pull-left"><h4 class="pull-left">{{ Lang::get('links.show_assignements') }}</h4>
				<br>
				<br>
				</div>
				<div class="panel-body">
					<table id="quiz_assignment_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.job') }}</th>
					            <th class="text-center">{{ Lang::get('messages.quiz') }}</th>
					            <th class="text-center">{{ Lang::get('messages.user') }}</th>
					            <th class="text-center">{{ Lang::get('messages.started_at') }}</th>
					            <th class="text-center col-md-2">{{ Lang::get('messages.pass_score') }}</th>
					            <th class="text-center">{{ Lang::get('messages.score') }}</th>
					            <th class="text-left">{{ Lang::get('messages.quizzes') }}</th>
					            <!-- <th class="text-center">{{ Lang::get('messages.actions') }}</th> -->
					        </tr>
					    </thead>
					</table>
				</div>
				<div class="panel-body">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
