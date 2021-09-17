<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/fontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/fontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="/fontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="/fontend/css/price-range.css" rel="stylesheet">
    <link href="/fontend/css/animate.css" rel="stylesheet">
	<link href="/fontend/css/main.css" rel="stylesheet">
	<link href="/fontend/css/responsive.css" rel="stylesheet">
	<title>@yield('title')</title>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/fontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/fontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/fontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/fontend/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
	@include('master.header')

	@yield('content')

	@include('master.footer')
</body>
</html>