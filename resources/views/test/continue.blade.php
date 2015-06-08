@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body text-center">
					<a class="btn btn-primary btn-lg" href="{{url('test')}}" role="button">{{Lang::get('messages.coninue_to_test')}} >></a>					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
