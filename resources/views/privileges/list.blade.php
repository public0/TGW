@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('messages.privileges') }}</div>

				<div class="panel-body">
				<?php// echo mcrypt_encrypt('aaa'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
