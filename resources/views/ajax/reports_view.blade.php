<ul class="list-inline">
    @if(in_array(7, $privsArray))
    <li>
        <form method="GET" action="{{\URL::to('/')}}/report/edit/{{$row->id}}" accept-charset="UTF-8">
            <input class="btn-sm label-info" type="submit" value="{{\Lang::get('messages.edit')}}">
        </form>
    </li>
    @endif
     @if(in_array($row->id,$gauss_id))
        
        <li>
            <form method="GET" action="{{\URL::to('/')}}/reports/show_report/{{$row->id}}" accept-charset="UTF-8" >
                <input class="btn-sm label-danger" type="submit" value="{{\Lang::get('messages.view')}}">
            </form>
        </li>
    @endif
    
</ul>
