<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
	<title>Register | Shoppe</title>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <style type="text/css">
    	#login{
    		padding-bottom: 40px;
    	}
    </style>
</head>
<body>
	@include('frontend.layouts.header')
		<div class="container" id="login">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Register!</h2>
						@if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
						<form action="#" method="POST">
							<input type="text" placeholder="Name" name="name" />
							<input type="email" placeholder="Email Address" name="email" />
							<input type="password" placeholder="Password" name="password" />
							<input type="password" placeholder="Confirm Password" name="cf_pwd" />
							<button type="submit" class="btn btn-default">Register</button>
							@csrf
						</form>
						<span>Bạn đã có tài khoản
							<a href="{{route('frontend.login')}}"> Click </a>
						</span>vào đây để đăng nhập
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	
	@include('frontend.layouts.footer')
</body>
</html>