<ul class="list-inline">
	@if(in_array(3, $privsArray))
	<li>
		<form method="GET" action="{{\URL::to('/')}}/categories/edit/{{$row->id}}" accept-charset="UTF-8">
			<input class="btn-sm label-info" type="submit" value="{{\Lang::get('messages.edit')}}">
		</form>
	</li>
	@endif

	@if($row->id != 1 && $row->quizzes->count() == 0)
		@if(in_array(4, $privsArray))
		<li>
			<form method="GET" action="{{\URL::to('/')}}/categories/delete/{{$row->id}}" accept-charset="UTF-8" class="confirm">
				<input class="btn-sm label-danger" type="submit" value="{{\Lang::get('messages.delete')}}">
			</form>
		</li>
		@endif
	@endif
</ul>
