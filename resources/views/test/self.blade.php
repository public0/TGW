@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $quiz->name }}</div>
					<table class="table table-striped">
					    <tbody>
					    	<?php $i = 1; ?>
					    	@foreach($quiz->questions as $question)
					    		<tr>
					    			<td><span class="label label-default">{{Lang::get('messages.question')}} {{$i}}:</span> {{ $question->question }}</td>
					    		</tr>
								@if(!empty($question->code))
									<tr>
										<td>									
											<code> <?= nl2br(trim($question->code)) ?> </code>
										</td>
									</tr>
								@endif
								<?php
									$z = 1; 
									$corect = [];
								?>
                                       @foreach($question->given_answers()->where('assignement_id', $assignement->id)->get() as $answer2)
                                        	<?php $corect=$answer2->answer_id;?>
                                             	     @if($question->question_type_id == 3 )
						    			<td><span class="label label-default">{{Lang::get('messages.answer')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						    			<hr>
						    			{{$answer2->answer}}
									
						    			</td>
						    			@endif
                                 	   @endforeach
								 

                                  @foreach($question->answers as $answer)
                                  <tr>
                                   
					    			
                                       @if($answer->id==$corect && $answer->corect==1 || $answer->id==$corect && $answer->corect==0 )
   								       <td> 
   								       	    <span class="label {{($answer->correct)?'label-success':'label-danger'}}">
					    					{{Lang::get('messages.answer')}} {{$z}}:&nbsp;&nbsp;
					    					</span>&nbsp; {{ $answer->answer }}
					    				</td>	
					    				@else
                                 		 <td>
                                 		    
                                 	 		<span class="label label-default">
					    					{{Lang::get('messages.answer')}} {{$z}}:&nbsp;&nbsp;
					    					</span> &nbsp; {{$answer->answer}}
                                 		 </td>
                                 	@endif

                                  </tr>
                                 
					    		<?php $z++; ?>
					    		@endforeach
					    		<?php $i++; ?>
					    	@endforeach
					    </tbody>
					</table>
				
			</div>
		</div>
	</div>
</div>
@endsection
