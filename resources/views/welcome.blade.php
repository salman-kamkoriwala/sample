<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel</title>

<!--  link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css" -->
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

<!-- Fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,300'
	rel='stylesheet' type='text/css'>
<style>
html, body {
	height: 100%;
}

body {
	margin: 0;
	padding: 0;
	width: 100%;
	display: table;
	font-weight: 100;
	font-family: 'Lato';
}

.container {
	text-align: center;
	display: table-cell;
	vertical-align: middle;
}

.content {
	text-align: center;
	display: inline-block;
}

.title {
	font-size: 96px;
}
</style>
</head>
<body>
	<div class="container">

		@include('navigation-container')
		
		<div class="content">
			<div class="title">Laravel 5.2 with</div>
			<div>
				<p>CryptoPayment GoURL.io + Node + Socket.IO + Express + MySQL +
					Events Broadcast Examples</p>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script
		src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
