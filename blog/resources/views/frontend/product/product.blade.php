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
	<title>Product | Shoppe</title>
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
				<div class="col-sm-9">
					<div class="signup-form"><!--sign up form-->
						<h2>Product</h2>
						@include('frontend.layouts.errors')
							<table class="table">
								<tr>
									<td>Id</td>
									<td>Name</td>
									<td>Image</td>
									<td>Price</td>								
									<td>Actived</td>
									<td>Action</td>
								</tr>
								@if(count($product) == 0)
									<h2 style="color:red;">Bạn không có sản phẩm nào cả vui lòng thêm sản phẩm</h2>
								@else
									@foreach($product as $pro)
									<?php $getIm = json_decode($pro['image'], true); ?>
										<tr>
											<td>{{$pro->id}}</td>
											<td>{{$pro->name}}</td>
											<td><img src="{{asset('/upload/product/'.$pro->user_id.'/hinhnho_'.reset($getIm))}}"></td>
											<td>{{$pro->price}}</td>
											<td>
												@if($pro->active == 0)
													<div style="width: 10rem" class="alert alert-success">Active</div>	
												@else
													<div style="width: 10rem" class="alert alert-danger" >No Active</div>
												@endif
											</td>
											<td>							
												<a href="{{route('frontend.product.edit',['id'=>$pro->id])}}">Edit</a> |
												<a href="{{route('frontend.product.destroy',['id'=>$pro->id])}}">Delete</a>
											</td>
										</tr>
									@endforeach	
								@endif
							</table>
						<a href="{{route('frontend.product.create')}}" class="btn btn-primary" >Add New</a>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	@include('frontend.layouts.footer')
</body>
</html>