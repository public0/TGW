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
					            <th class="text-center">{{ Lang::get('messages.quizzes') }}</th>
					            <th class="text-center">{{ Lang::get('messages.actions') }}</th>
					        </tr>
					    </thead>
					    <tbody>
							@foreach ($categories as $category)
							    <tr>
							    	<td class="text-center">{{ $category->name }}</td>
							    	<td class="text-center">
							    		{{ $category->quizzes->count() }}
							    		{{-- @foreach($category->quizzes as $quiz) --}}
							    			<p>{{-- $quiz->name --}}</p>
							    		{{-- @endforeach --}}
							    	</td>
							    	<td class="text-center">
								    	<ul class="list-inline">
											@if(in_array(3, $privsArray))
								    		<li>
												{!! Form::open(['url' => 'categories/edit/'.$category->id, 'method' => 'GET']) !!}
													{!! Form::submit(Lang::get('messages.edit'), ['class' => 'btn-sm label-info']) !!}
												{!! Form::close() !!}
								    		</li>
								    		@endif
											@if($category->id != 1)
												@if(in_array(4, $privsArray))
									    		<li>
													{!! Form::open(['url' => 'categories/delete/'.$category->id, 'method' => 'DELETE', 'class' => 'confirm']) !!}
														{!! Form::submit(Lang::get('messages.delete'), ['class' => 'btn-sm label-danger']) !!}
													{!! Form::close() !!}							    			
									    		</li>
									    		@endif
								    		@endif
								    	</ul>
							    	</td>
							    </tr>
							@endforeach					    
					    </tbody>
					</table>
<!-- 					<div class="row text-center">					
						<?php// echo $categories->render(); ?>
					</div>
 -->				</div>
			</div>
		</div>
	</div>
</div>
@endsection
