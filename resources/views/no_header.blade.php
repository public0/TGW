<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vauban</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="{{ asset('/css/bootstrap-multiselect.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/jquery.countdown.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/redmond.datepick.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/image-modal.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body oncopy="return false" oncut="return false" onpaste="return false">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="custom-navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/images/trsnsmotto1.png') }}" /></a>
			</div>
		</div>
	</nav>
	@yield('content')
	<div class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
		</div>
	</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>	
	<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>
	<script src="{{ asset('/js/jquery.plugin.js') }}"></script>
	<script src="{{ asset('/js/jquery.countdown.js') }}"></script>
	<script src="{{ asset('/js/jquery.datepick.js') }}"></script>
	<script src="{{ asset('/js/image-modal.js') }}"></script>
	<script type="text/javascript">
	var base_url = '{{ URL::to('/') }}';
	var pathArray = window.location.pathname.split('/');
	$(function() {
		$(window).blur(function(e) {
			//alert('You may not leave');
		});

	});
	</script>
	<script src="{{ asset('/js/js.js') }}"></script>
</body>
</html>
