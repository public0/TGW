<ul class="list-inline">
	@if(in_array(7, $privsArray))
	<li>
		<form method="GET" action="{{\URL::to('/')}}/quizz/edit/{{$row->id}}" accept-charset="UTF-8">
			<input class="btn-sm label-info" type="submit" value="Edit">
		</form>
	</li>
	@endif
	@if( !$quizJobs)
		@if(in_array(8, $privsArray))
		<li>
			<form method="GET" action="{{\URL::to('/')}}/quizz/delete/{{$row->id}}" accept-charset="UTF-8" class="confirm">
				<input class="btn-sm label-danger" type="submit" value="Delete">
			</form>
		</li>
		@endif
	@endif
</ul>
