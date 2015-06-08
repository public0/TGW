@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="pull-left">
				{{ Lang::get('messages.questions') }}</h4>
				{!! Form::open(['url' => 'questions', 'method' => 'GET', 'class' => 'pull-right']) !!}
					{!! Form::text('q', null, ['class' => '']) !!}
					{!! Form::submit(Lang::get('messages.search'), ['class' => 'btn-sm label-info']) !!}
				{!! Form::close() !!}
				<br>
				<br>				
				</div>
				<div class="panel-body">
					<table id="questions_table" class="table table-striped">
					    <thead>
					        <tr>
					            <th class="text-center">{{ Lang::get('messages.quiz') }}</th>
					            <th class="text-center">{{ Lang::get('messages.question') }}</th>
					            <th class="text-center">{{ Lang::get('messages.type') }}</th>
					            <th class="text-center">{{ Lang::get('messages.points') }}</th>
					            <th class="text-center">{{ Lang::get('messages.actions') }}</th>
					        </tr>
					    </thead>
					    <tbody>
							@foreach ($questions as $question)
							@if(isset($question->quiz[0]))
							    <tr>
							    	<td class="text-left">{{ $question->quiz[0]->name }}</td>
							    	<td class="">{!! $question->question !!}</td>
							    	<td class="text-center">{{ $question->question_type->type }}</td>
							    	<td class="text-center">{{ $question->points }}</td>
							    	<td class="text-center">
								    	<ul class="list-inline">
											@if(in_array(19, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'question/edit/'.$question->id, 'method' => 'GET']) !!}
													{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
												{!! Form::close() !!}
								    		</li>
								    		@endif
											@if(in_array(20, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'question/delete/'.$question->id, 'method' => 'DELETE', 'class' => 'confirm']) !!}
													{!! Form::submit(Lang::get('messages.delete'), ['class' => 'btn-sm label-danger']) !!}
												{!! Form::close() !!}							    			
								    		</li>
								    		@endif
								    	</ul>
							    	</td>
							    </tr>
							@endif
							@endforeach
					    </tbody>
					</table>
					<br>
					<br>
					<div class="row text-center">
						<?php //echo $questions->render(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
