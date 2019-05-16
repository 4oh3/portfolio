<!doctype html>

<html lang="{{ app()->getLocale() }}">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127755223-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-127755223-1');
	</script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Austin's Portfolio</title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

	<link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
	<link rel="manifest" href="/assets/icons/site.webmanifest">
	<link rel="mask-icon" href="/assets/icons/safari-pinned-tab.svg" color="#4c87fc">
	<link rel="shortcut icon" href="/assets/icons/favicon.ico">
	
	<meta name="apple-mobile-web-app-title" content="Austin's Page">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="application-name" content="Austin's Page">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-config" content="/assets/icons/browserconfig.xml">
	<meta name="theme-color" content="#4c87fc">
</head>

<body>
    @yield('content')

	<script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

	<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>