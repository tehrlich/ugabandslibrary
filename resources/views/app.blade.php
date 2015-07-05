<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UGA Bands Library</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">UGA Bands Library</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li><a href="{{ url('/recent') }}">Recent Works</a></li>
					<li><a href="{{ url('/ms') }}">Middle School</a></li>
					<li><a href="{{ url('/scoreonly') }}">Score Only</a></li>
					<li><a href="{{ url('/checkedout') }}">Checked Out</a></li>
					<li><a href="{{ url('/deleted') }}">Deleted Works</a></li>
					<li><a href="{{ url('/create') }}">Add Work</a></li>
					<li><a href="{{ url('/users') }}">User Admin</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li role="presentation" class="dropdown-header"><b>Access Level:</b> {{ Auth::user()->priv }}</li>
								<li role="presentation" class="dropdown-header"><b>Email Address:</b> {{ Auth::user()->email }}</li>
								<li role="presentation" class="divider"></li>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('/jquery.min.js') }}"></script>
	<script src="{{ asset('/bootstrap.min.js') }}"></script>
</body>
</html>
