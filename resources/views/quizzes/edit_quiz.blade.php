@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.edit_quiz') }} - {{ $quiz->name }}</div>
				<div class="panel-body">
				{!! Form::open(['url' => 'quizz/update/'.$quiz->id]) !!}
				<div class="form-group">
					{!! Form::label('category_id', Lang::get('messages.category')) !!}

					{!! Form::select('category_id', $categories, $quiz->category_id, ['class' => 'form-control']); !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('score_junior','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('score_junior', Lang::get('messages.junior_score')) !!}

					{!! Form::text('score_junior', $quiz->score_junior, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('score_mid','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('score_mid', Lang::get('messages.mid_score')) !!}

					{!! Form::text('score_mid', $quiz->score_mid, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('score_senior','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('score_senior', Lang::get('messages.senior_score')) !!}

					{!! Form::text('score_senior', $quiz->score_senior, ['class' => 'form-control']) !!}
				</div>
				<div id="intern_quiz" style="<?= ($quiz->category_id == 1)?'':'display:none;'?>">
					<div class="form-group">
						<?php echo $errors->first('from','<div class="alert alert-danger" role="alert">
	  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  					<span class="sr-only">Error:</span>:message</div>'); ?>					
						{!! Form::label('from', Lang::get('messages.from')) !!}

						{!! Form::text('from', ($quiz->from != '0000-00-00 00:00:00')?date('Y-m-d', strtotime($quiz->from)):'0000-00-00', ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						<?php echo $errors->first('to','<div class="alert alert-danger" role="alert">
	  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  					<span class="sr-only">Error:</span>:message</div>'); ?>					
						{!! Form::label('to', Lang::get('messages.to')) !!}

						{!! Form::text('to', ($quiz->to != '0000-00-00 00:00:00')?date('Y-m-d', strtotime($quiz->to)):'0000-00-00', ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('name', 'Name') !!}

					{!! Form::text('name', $quiz->name, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('time','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('time', Lang::get('messages.time')) !!}

					{!! Form::text('time', $quiz->time, ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('description', Lang::get('messages.description')) !!}

					{!! Form::textarea('description', $quiz->description, ['class' => 'form-control', 'rows' => 2]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('intro', Lang::get('messages.intro')) !!}

					{!! Form::textarea('intro', $quiz->intro, ['class' => 'form-control', 'rows' => 3]) !!}
				</div>
				<div class="form-group">
					{!! Form::label('show_intro', Lang::get('messages.show_intro')) !!}
					{!! Form::hidden('show_intro', 0) !!}
					{!! Form::checkbox('show_intro', 1, ($quiz->show_intro)?true:false, ['class' => '']) !!}
				</div>
				<div class="form-group">
					{!! Form::submit(Lang::get('messages.submit'), ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
				<div class="panel-body">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
