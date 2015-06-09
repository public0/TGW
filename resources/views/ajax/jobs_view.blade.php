<ul class="list-inline">
	@if(in_array(23, $privsArray))
	<li>
		<form method="GET" action="{{URL::to('/')}}/job/edit/{{$row->id}}" accept-charset="UTF-8">
	   	 	<input class="btn-sm label-info" type="submit" value="Edit">
	   	</form>
	</li>
	@endif

	@if($row->id != 1)
		@if(in_array(24, $privsArray))
		<li>
		<form method="GET" action="{{URL::to('/')}}/job/delete/{{$row->id}}" accept-charset="UTF-8">
	   	 	<input class="btn-sm label-danger" type="submit" value="Edit">
	   	</form>
	</li>
		@endif
	@endif
</ul>
