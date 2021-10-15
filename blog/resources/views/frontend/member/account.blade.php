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
	<title>Account | Shoppe</title>
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
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Account</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="{{route('frontend.account')}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Account
										</a>
									</h4>
								</div>
							</div>		
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="{{route('frontend.product')}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Product
										</a>
									</h4>
								</div>
							</div>				
						</div><!--/category-products-->
					</div>
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="signup-form"><!--sign up form-->
						<h2>User Update!!!</h2>
						<form action="" method="POST" enctype="multipart/form-data">
							@if ($errors->any())
							<div class="alert alert-danger">
							   <ul>
							      @foreach ($errors->all() as $error)
							      <li>{{ $error }}</li>
							      @endforeach
							   </ul>
							</div>
							@endif
							@if (session('success'))
							<div class="alert alert-success alert-dismissible">
							   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
							   <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
							   {{session('success')}}
							</div>
							@endif
							<input type="text" name="name" value="{{$user->name}}" />
							<input type="email" readonly name="email" value="{{$user->email}}"/>
							<input type="password" name="password" value="" />
							<input type="text" name="address" value="{{$user->address}}">
                            <select class="form-control form-control-line" name="country" autofocus>
                                @foreach($country as $va)
                                    <option value="{{$va->id}}" {{ $user->country == $va->id ? 'selected':'' }}> {{$va->name}}</option>
                                @endforeach 
                            </select>
							<input type="text" name="phone" value="{{$user->phone}}">
							<input type="file" name="avatar">
							<button type="submit" class="btn btn-default">Update</button>
							@csrf
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	
	@include('frontend.layouts.footer')
</body>
</html>