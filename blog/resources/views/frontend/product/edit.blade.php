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
	<script src="https://code.jquery.com/jquery-latest.js"></script>
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
						<h2>Edit Product</h2>
						@include('frontend.layouts.errors')
							<form class="form" method="POST" action="" enctype="multipart/form-data">
								<input type="text" name="name" value="{{$getProducts['name']}}">
								<input type="text" name="price" value="{{$getProducts['price']}}">
								<select name="category" >
									<option value="">Please choose category</option>
									@foreach($cat as $ca)
									<option value="{{$ca->id}}" 
										{{$getProducts['category_id'] == $ca->id ? 'selected':''}} 
										>{{$ca->name}}</option>
									@endforeach
								</select>
								<select name="brand">
									<option value="">Please choose category</option>
									@foreach($brands as $br)
									<option
										value="{{$br->id}}"
										{{$getProducts['brand_id'] == $br->id ? 'selected':''}}  >
										{{$br->name}}</option>
									@endforeach
								</select>
								<select class="checkNew" name="new" onchange="check(this)">
									<option value="0">New</option>
									<option value="1" {{$getProducts['new'] == 1 ? 'selected':''}} >Sale</option>
								</select>
								@if($getProducts['sale'])
								<div id="hh" style="width: 100px;">
									<input type="text" name="sale" value="{{$getProducts['sale']}}">
								</div>
								@endif
								<div id="sale" style="width: 100px;">
									<input type="text" name="sale" >
								</div>
								<input type="text" name="company" value="{{$getProducts['company']}}" >
								<input type="file" name="filename[]" multiple />
								<div class="col-sm-6">
									<!-- <label style="float: left;">Vui lòng chọn hình ảnh để xoá:</label> -->
								@foreach($getArrImage as $img)
									<div class="col-sm-3"> 
										<img src="{{asset('/upload/product/'.Auth::id().'/'.$img)}}" width="70" >
										<input type="checkbox" name="demo[]" value="{{$img}}" style="width: 70px;">
									</div>
								@endforeach
								</div>
								<textarea placeholder="Detail" name="detail" rows="6">{{$getProducts['detail']}}</textarea>
								<button class="btn btn-success" type="submit">Edit product</button>
								@csrf
							</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
		<script>
			$("#sale").hide();
			function check(obj)
            {    	
                 var value = obj.value;
                 if (value == 1) {
                 	$('#sale').show();
                 	// $('#hh').show();
                 }
                 else if (value == 0) {
                 	$("#sale").hide();
                 	$('#hh').hide();
                 }
            }
		</script>
	@include('frontend.layouts.footer')
</body>
</html>