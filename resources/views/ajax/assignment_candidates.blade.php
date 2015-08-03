@foreach($row->users as $user)
	{{ $user->surname }} {{ $user->name }} 
@endforeach