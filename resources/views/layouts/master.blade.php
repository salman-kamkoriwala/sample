<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Socket.io using Laravel Events Example</title>
    <!--  link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css" -->
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

<!-- Fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,300'
	rel='stylesheet' type='text/css'>
</head>
<body>
@include('notification')

@include('navigation-container')
        
@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
@yield('footer')

<!-- Scripts -->
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>