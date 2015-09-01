<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vauban</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="{{ asset('/css/bootstrap-multiselect.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/jquery.countdown.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/redmond.datepick.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/image-modal.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.bootstrap.css') }}">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href="{{ asset('/images/trsnsmotto1.png') }}" rel="shortcut icon" type="{{ asset('/images/trsnsmotto1.png') }}" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	@if(\Config::get('app.testing_server')) 
			<span class="label label-warning center_span">{{ Lang::get('messages.testing_environment') }}</span>
		@endif
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

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				@if (!Auth::guest())
				<ul class="nav navbar-nav">
					@if((int)array_intersect([1,2], $privsArray) > 0)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('links.categories') }}</a>						
							<ul class="dropdown-menu" role="menu">
								@if(in_array(2, $privsArray))
								<li><a href="{{ url('categories') }}">{{ Lang::get('links.show_categories') }}</a></li>
								@endif
								@if(in_array(1, $privsArray))
								<li><a href="{{ url('categories/create') }}">{{ Lang::get('links.new_category') }}</a></li>
								@endif
							</ul>
					</li>
					@endif
					@if((int)array_intersect([5,6], $privsArray) > 0)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('links.quiz') }}</a>
							<ul class="dropdown-menu" role="menu">
								@if(in_array(6, $privsArray))
									<li><a href="{{ url('quizzes') }}">{{ Lang::get('links.show_quiz') }}</a></li>
								@endif
								@if(in_array(5, $privsArray))
								<li><a href="{{ url('quizzes/create') }}">{{ Lang::get('links.new_quiz') }}</a></li>
								@endif
							</ul>
					</li>
					@endif
					@if((int)array_intersect([9,10], $privsArray) > 0)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('links.users') }}</a>
						<ul class="dropdown-menu" role="menu">
							@if(in_array(10, $privsArray))
							<li><a href="{{ url('users') }}">{{ Lang::get('links.show_users') }}</a></li>
							@endif
							@if(in_array(9, $privsArray))
							<li><a href="{{ url('user/create') }}">{{ Lang::get('links.new_user') }}</a></li>
							@endif
						</ul>
					</li>
					@endif
					@if((int)array_intersect([13,14], $privsArray) > 0)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('links.assignements') }}</a>
						<ul class="dropdown-menu" role="menu">
							@if(in_array(14, $privsArray))
							<li><a href="{{ url('jobs_assignements') }}">{{ Lang::get('links.show_assignements') }}</a></li>
							@endif
							@if(in_array(13, $privsArray))
							<li><a href="{{ url('new_assignement') }}">{{ Lang::get('links.new_assignement') }}</a></li>
							@endif
						</ul>
					</li>
					@endif
					@if((int)array_intersect([17,18], $privsArray) > 0)
<!-- 					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('links.questions') }}</a>
						<ul class="dropdown-menu" role="menu">
							@if(in_array(18, $privsArray))
							<li><a href="{{ url('questions') }}">{{ Lang::get('links.show_questions') }}</a></li>
							@endif
							@if(in_array(17, $privsArray))
							<li><a href="{{ url('question/create') }}">{{ Lang::get('links.new_question') }}</a></li>
							@endif
						</ul>
					</li>
 -->					@endif
					@if((int)array_intersect([21,22], $privsArray) > 0)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('links.jobs') }}</a>
						<ul class="dropdown-menu" role="menu">
							@if(in_array(22, $privsArray))
							<li><a href="{{ url('jobs') }}">{{ Lang::get('links.show_jobs') }}</a></li>
							@endif
							@if(in_array(21, $privsArray))
							<li><a href="{{ url('job/create') }}">{{ Lang::get('links.new_job') }}</a></li>
							@endif
						</ul>
					</li>
					@endif
					@if((int)array_intersect([29,30], $privsArray) > 0)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Lang::get('links.reports') }}</a>
						<ul class="dropdown-menu" role="menu">
							@if(in_array(30, $privsArray))
							<li><a href="{{ url('reports') }}">{{ Lang::get('links.show_reports') }}</a></li>
							@endif
							<!--@if(in_array(29, $privsArray))
							<li><a href="{{ url('report/create') }}">{{ Lang::get('links.new_report') }}</a></li>
							@endif-->
						</ul>
					</li>
					@endif
				</ul>
				@endif
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<!-- <li><a href="{{ url('/auth/register') }}">Register</a></li> -->
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Lang::get('messages.welcome') }} {{ (Auth::user()->name != '')?Auth::user()->name:Auth::user()->login }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<br>
	<br>
	@yield('content')
<!-- 	<div class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
		</div>
	</div>
 -->	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>	
	<script src="{{ asset('/js/dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>
	<script src="{{ asset('/js/jquery.plugin.js') }}"></script>
	<script src="{{ asset('/js/jquery.countdown.js') }}"></script>
	<script src="{{ asset('/js/jquery.datepick.js') }}"></script>
	<script src="{{ asset('/js/image-modal.js') }}"></script>
	<script type="text/javascript">
	var base_url = '{{ URL::to('/') }}';
	var pathArray = window.location.pathname.split('/');
	</script>
	<script src="{{ asset('/js/js.js') }}"></script>
</body>
</html>
