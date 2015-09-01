@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('links.edit_report') }}
				<?php if($continue){
					    echo "  Total score :="?>
					   {!! Form::label('totalscore',$report->very_good,['class' =>'total_score']) !!}
				      <?php }else{
				      	echo "  Total score :=" ?>
				      	{!! Form::label('totalscore',$report->score,['class' =>'total_score']) !!}
				      <?php	} ?></div>
				<div class="panel-body">
				<?php if($continue){?>
				{!! Form::open(['url' => 'report/update/'.$id_rap, 'method' => 'POST']) !!}
				<?php }else{?>
				{!! Form::open(['url' => 'report/store', 'method' => 'PUT']) !!}
				{!! Form::hidden('quiz_id', $report->id) !!}
				<?php  }?>
				<div class="form-group">
					<?php echo $errors->first('Name','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>					
					{!! Form::label('name', Lang::get('messages.name')) !!}
					{!! Form::text('name', $report->name, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('', Lang::get('messages.report_score')) !!}
				</div>
				<div class="form-group">
					<?php echo $errors->first('very_bad','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('very_bad', Lang::get('messages.very_bad')) !!}{!! Form::label(Lang::get('messages.points')) !!}
                    <?php if($continue){?>
					{!! Form::text('very_bad','0-'.$report->very_bad, ['class' => 'form-control verybad','placeholder' => '0-'.$report->very_bad]) !!}
					<?php }else{ ?>
					{!! Form::text('very_bad',null, ['class' => 'form-control verybad','placeholder' => '0 - 0']) !!}
					<?php }?>
				</div>
				<div class="form-group">
					<?php echo $errors->first('bad','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('bad', Lang::get('messages.bad')) !!}{!! Form::label(Lang::get('messages.points')) !!}
                    <?php if($continue){?>
					{!! Form::text('bad', ++$report->very_bad.'-'.$report->bad, ['class' => 'form-control bad','placeholder' => $report->very_bad.'-'.$report->bad]) !!}
					<?php }else{ ?>
					{!! Form::text('bad',null, ['class' => 'form-control bad','placeholder' => '0 - 0']) !!}
					<?php }?>
					
				</div>
				<div class="form-group">
					<?php echo $errors->first('medium','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('medium', Lang::get('messages.medium')) !!}{!! Form::label(Lang::get('messages.points')) !!}
                    <?php if($continue){?>
					{!! Form::text('medium', ++$report->bad.'-'.$report->medium, ['class' => 'form-control medium','placeholder' => $report->bad.'-'.$report->meedium]) !!}
					<?php }else{ ?>
					{!! Form::text('medium', null, ['class' => 'form-control medium','placeholder' => '0 - 0']) !!}
					<?php }?>
					
				</div>
				<div class="form-group">
					<?php echo $errors->first('good','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('good', Lang::get('messages.good')) !!}{!! Form::label(Lang::get('messages.points')) !!}
                    <?php if($continue){?>
					{!! Form::text('good', ++$report->medium.'-'.$report->good, ['class' => 'form-control good','placeholder' => $report->meedium.'-'.$report->good]) !!}
					<?php }else{ ?>
					{!! Form::text('good', null, ['class' => 'form-control good','placeholder' => '0 - 0']) !!}
					<?php }?>
					
				</div>
				<div class="form-group">
					<?php echo $errors->first('very_good','<div class="alert alert-danger" role="alert">
  					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					<span class="sr-only">Error:</span>:message</div>'); ?>			
					{!! Form::label('very_good', Lang::get('messages.very_good')) !!}{!! Form::label(Lang::get('messages.points')) !!}
                    <?php if($continue){?>
					{!! Form::text('very_good', ++$report->good.'-'.$report->very_good, ['class' => 'form-control verygood','readonly']) !!}
					<?php }else{ ?>
					{!! Form::text('very_good', null, ['class' => 'form-control verygood','placeholder' => '0 -'.$report->score,'readonly']) !!}
					<?php }?>
					
				</div>
				
				<?php if($create && !$continue){?>
                  <div class="form-group">
					{!! Form::submit(Lang::get('messages.generate_report'), ['class' => 'btn btn-primary form-control']) !!}
				  </div>
				<?php }else if($edit && $continue) {?>
                 <div class="form-group">
					{!! Form::submit(Lang::get('messages.generate_report'), ['class' => 'btn btn-primary form-control']) !!}
				  </div>
                 <?php }?>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
