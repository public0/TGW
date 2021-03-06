@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.new_question') }}</div>
				<div class="panel-body">
				@if(isset($id))				
				{!! Form::open(['url' => 'question/store/'.$id, 'method' => 'PUT', 'files' => TRUE]) !!}
				@else
				{!! Form::open(['url' => 'question/store', 'method' => 'PUT', 'files' => TRUE]) !!}
				@endif
				<div class="form-group">
					<?php echo $errors->first('points','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('points', Lang::get('messages.points')) !!}

					{!! Form::text('points', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('question','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('question', Lang::get('messages.question')) !!}

					{!! Form::text('question', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('question_image', Lang::get('messages.image')) !!}

					{!! Form::file('question_image', ['class' => 'form-control file']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('code', Lang::get('messages.code')) !!}

					{!! Form::textarea('code', null, ['class' => 'form-control']) !!}
				</div>
				<!--
				<div class="form-group">
					{!! Form::label('header_text', Lang::get('messages.header_text')) !!}

					{!! Form::textarea('header_text', null, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('footer_text', Lang::get('messages.footer_text')) !!}

					{!! Form::textarea('footer_text', null, ['class' => 'form-control']) !!}
				</div>
				-->
				<div class="form-group">
					{!! Form::label('question_type_id', Lang::get('messages.type')) !!}

					{!! Form::select('question_type_id', $types, 1, ['class' => 'form-control']) !!}
				</div>
				<div id="counter" data-value="{{ $answer_counter }}"></div>
				<div class="form-group" id="answers">
					<?php echo $errors->first('multi_text[]','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					<?php echo $errors->first('multi_value[]','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					

					<?php echo $errors->first('single_text[]','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					<?php echo $errors->first('single_value[]','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					

  					<?php echo $errors->first('text','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>	

					{!! Form::label('', Lang::get('messages.answers')) !!}
					<span class="btn btn-default label label-success" id="add_multi">{{ Lang::get('messages.add') }}</span>
					<span class="btn btn-default label label-danger" id="sub_multi">{{ Lang::get('messages.subtract') }}</span>
					<div id="dynamic_multi">
						@for($i = 0; $i < $answer_counter; $i++)
						<div id="multi_{{$i}}" data-id="{{$i}}">
							<input class="form-inline" placeholder="Answer" name="multi_text[]" type="text">
							{!! Form::label('multi_value[]', Lang::get('messages.correct')) !!}
							{!! Form::hidden('multi_value['.$i.']', 0) !!}
							{!! Form::checkbox('multi_value['.$i.']', 1, false, ['class' => 'form-inline']) !!}
						<br><br>
						</div>
						@endfor
					</div>
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
