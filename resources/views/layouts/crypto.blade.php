<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='Expires' content='-1'>

@yield('title')
<!--  link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css" -->
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

<!-- Fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,300'
	rel='stylesheet' type='text/css'>

<script src='cryptobox.min.js' type='text/javascript'></script>
</head>
<body>
	@include('notification')
	
	@include('navigation-container') @yield('content')

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	@yield('footer')

	<!-- Scripts -->
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>