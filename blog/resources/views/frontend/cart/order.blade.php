@extends('frontend.layouts.app')
@section('title')
	Home | Shoppe
@endsection('title')
@section('content')
		<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Order</li>
				</ol>
			</div>	
			@guest
			<div class="row" style="margin-bottom: 20Px;">
				<div class="col-md-6">
					<div class="signup-form"><!--sign up form-->
						<h2>Bạn chưa đăng nhập vui lòng ký nhanh</h2>
						@if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
						<form action="" method="POST">
							<input type="text" placeholder="Name" name="name" />
							<input type="email" placeholder="Email Address" name="email" />
							<input type="password" placeholder="Password" name="password" />
							<button type="submit" class="btn btn-default">Continue</button>
							@csrf
						</form>
						<span>Bạn đã có tài khoản
							<a href="{{route('frontend.login')}}"> Click </a>
						</span>vào đây để đăng nhập
					</div><!--/sign up form-->
				</div>
			</div>	
			@endguest	
			<div class="row" >
			<div class="table-responsive cart_info col-md-8" >
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="price">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if(isset($cart))
						@foreach($cart as $item)
						<?php 
							$getIm = json_decode($item['image'], true); 
							$item['price'] = $item['price'] *(100 - $item['sale'])/100;
							$tong = $item['price'] * $item['qty'];
							$total = $total + $tong;
						?>
						<tr>
							<td class="cart_product">
								<img src="{{asset('/upload/product/'.$item['user_id'].'/hinhnho_'.reset($getIm))}}" alt="">
							</td>
							<td class="cart_description">
								<h4><a href="{{route('frontend.product.details',['id' => $item['id'], 'slug' => Str::slug($item['name'])])}}">{{$item['name']}}</a></h4>
								<p>Web ID: {{$item['id']}}</p>
							</td>
							<td class="cart_price">
								<p>${{$item['price']}}</p>
							</td>
							<td class="cart_quantity">
								<p>{{$item['qty']}}</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{$tong}}</p>
							</td>
						</tr>
						@endforeach
						@else
						<p>haha</p>
						@endif
					</tbody>
				</table>
			</div>
		<div class="row">
				<div class="col-sm-4" style="float: right;">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Tax<span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span id="tong">{{$total}}</span><span>$</span></li>
						</ul>
							<a class="btn btn-default check_out" href="{{route('frontend.testmail')}}" style="float: right;">Order</a>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section> <!--/#cart_items-->



@endsection('js')


