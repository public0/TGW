<ul class="list-inline">
	<div class="form-group row" style="width:100%;">
	@if(in_array(26, $privsArray))
	<li>
		<form method="GET" action="{{\URL::to('/')}}/privileges/{{$row->id}}/edit" accept-charset="UTF-8">
			<input class="btn-sm btn-action label-info col-md-6" type="submit" value="{{Lang::get('messages.privileges')}}">
		</form>
	</li>
	@endif
	@if(in_array(11, $privsArray))
	<li>
		<form method="GET" action="{{\URL::to('/')}}/user/edit/{{$row->id}}" accept-charset="UTF-8">
			<input class="btn-sm btn-action label-info col-md-6" type="submit" value="{{Lang::get('messages.edit')}}">
		</form>
	</li>
	@endif
	@if(in_array(12, $privsArray))
	<!-- <li>
		<form method="GET" action="{{URL::to('/')}}/user/delete/{{$row->id}}" accept-charset="UTF-8" class="confirm">
			<input class="btn-sm label-danger" type="submit" value="{{Lang::get('messages.delete')}}">
		</form>
	</li>
	-->
    @if($row->status == 1)
          <?php $stat = 0;?>
	    <li>
			<form method="POST" action="{{URL::to('/')}}/user/status/{{$row->id}}/{{$stat}}" accept-charset="UTF-8" class="confirm">
				<input name="_token" type="hidden" value="{{ csrf_token() }}" >

				<input class="btn-sm btn-action label-danger col-xs-12" type="submit" value="{{Lang::get('messages.dezactivate')}}">
			</form>
		</li>
    
    @else
    <?php $stat = 1;?>
	    <li>
			<form method="POST" action="{{URL::to('/')}}/user/status/{{$row->id}}/{{$stat}}" accept-charset="UTF-8" class="confirm">
				<input name="_token" type="hidden" value="{{ csrf_token() }}" >

				<input class="btn-sm btn-action label-danger col-xs-12" type="submit" value="{{Lang::get('messages.activate')}}">
			</form>
		</li>
	
     @endif
	@endif
	</div>
</ul>