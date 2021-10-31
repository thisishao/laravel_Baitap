<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<title>@yield('title')</title>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('rate/css/rate.css')}}">
    <script src="{{asset('rate/js/jquery-1.9.1.min.js')}}"></script>
    @yield('js.head')
</head>
<body>
	@include('frontend.layouts.header')
    @include('frontend.layouts.slide')
    <section>
        <div class="container">
            <div class="row">
                @include('frontend.layouts.menu-left')
                <!-- ================== -->
                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
                <!-- ========================= -->
            </div>
        </div>
    </section>
	@include('frontend.layouts.footer')
</body>
</html>
@yield('js')
<script type="text/javascript">
    $(document).ready(function(){
        let getUrl = window.location.pathname;

        if (getUrl == "/cart" || getUrl == "/order-succes") {
            $("#menu-left").hide();
            $("#slider").hide();
        }
        // console.log(getUrl);





    });
</script>