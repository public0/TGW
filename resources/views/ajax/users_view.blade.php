<ul class="list-inline">
	@if(in_array(26, $privsArray))
	<li>
		<form method="GET" action="{{\URL::to('/')}}/privileges/{{$row->id}}/edit" accept-charset="UTF-8">
			<input class="btn-sm label-info" type="submit" value="{{Lang::get('messages.privileges')}}">
		</form>
	</li>
	@endif
	@if(in_array(11, $privsArray))
	<li>
		<form method="GET" action="{{\URL::to('/')}}/user/edit/{{$row->id}}" accept-charset="UTF-8">
			<input class="btn-sm label-info" type="submit" value="{{Lang::get('messages.edit')}}">
		</form>
	</li>
	@endif
	@if(in_array(12, $privsArray))
	<li>
		<form method="GET" action="{{URL::to('/')}}/user/delete/{{$row->id}}" accept-charset="UTF-8" class="confirm">
			<input class="btn-sm label-danger" type="submit" value="{{Lang::get('messages.delete')}}">
		</form>
	</li>
	@endif
</ul>
