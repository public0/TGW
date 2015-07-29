

<form method="GET" action="{{\URL::to('/')}}/assignment/delete/{{$row->id}}/{{$quiz->quiz->id}}" accept-charset="UTF-8" class="confirm">
	<input class="confirm btn-sm label-danger" type="submit" value="{{Lang::get('messages.delete')}}">
</form>


