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
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
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
								<div class="cart_quantity_button">
									<a id="{{$item['id']}}" class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$item['qty']}}" autocomplete="off" size="2">
									<a id="{{$item['id']}}" class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{$tong}}</p>
							</td>
							<td class="cart_delete">
								<!-- <input id="keys" type="hidden" name="" value="{{$item['id']}}"> -->
								<a id="{{$item['id']}}" class="cart_quantity_delete" href=""> <i class="fa fa-times" ></i> </a>
							</td>
						</tr>
						@endforeach
						@else
						<p>haha</p>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Tax<span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span id="tong">{{$total}}</span><span>$</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{route('frontend.testmail')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	@endsection('content')
@section('js')
	<script type="text/javascript">
	
    $(document).ready(function(){

    	$("a.cart_quantity_up").click(function(e){

            var getQty = $(this).closest("tr").find("input").val();
            $(this).closest("tr").find("input").val(parseInt(getQty) + 1);

            var getPrice= $(this).closest("tr").find(".cart_price p").text();
            var price = getPrice.slice(1)
            var getTotal = $(this).closest("body").find("#tong").text();
            var total = getTotal.slice(1);

            tong = (parseInt(getQty) + 1) * parseInt(price);
            $(this).closest("tr").find(".cart_total p").text("$"+tong);
            $(this).closest("body").find("#tong").text(parseInt(getTotal) + parseInt(price));

            var getId = $(this).attr("id");

            e.preventDefault();

          	$.ajax({
				method: "POST",
				url: "{{route('frontend.cart.update')}}",
					data: {
						cong: getId,
						_token: '{{csrf_token()}}'
					},
					success : function(response){
						console.log(response);
					}
			});

        	// console.log(getId);
                
        });


        $("a.cart_quantity_down").click(function(e){
        	e.preventDefault();
    			var getQty = $(this).closest("tr").find("input").val();
				var getTotal = $(this).closest("body").find("#tong").text();
				$(this).closest("tr").find("input").val(parseInt(getQty) - 1);
				
				var getPrice= $(this).closest("tr").find(".cart_price p").text();
				var price = getPrice.slice(1)
				down = (parseInt(getQty) - 1) * parseInt(price);
				$(this).closest("tr").find(".cart_total p").text("$"+down);
				$(this).closest("body").find("#tong").text(parseInt(getTotal) - parseInt(price));

				if (getQty == 1) {
					var remove = $(this).closest("tr").remove();
				}

    			var getId = $(this).attr("id");
    			// console.log(getId);

	    		$.ajax({
					method: "POST",
					url: "{{route('frontend.cart.update')}}",
						data: {
							tru: getId,
							_token: '{{csrf_token()}}'
						},
						success : function(response){
							console.log(response);
						}
				});
			
  
    		});

        $("a.cart_quantity_delete").click(function(e){
        	var getTotals = $(this).closest("body").find("#tong").text();
			var getPrice = $(this).closest("tr").find(".cart_total_price").text();
			var price = getPrice.slice(1)
			$(this).closest("body").find("#tong").text(parseInt(getTotals) - parseInt(price));

			var remove = $(this).closest("tr").remove();
    		var getId = $(this).attr("id");

		    $.ajax({
				method: "POST",
				url: "{{route('frontend.cart.update')}}",
					data: {
						remove: getId,
						_token: '{{csrf_token()}}'
					},
					success : function(response){
						console.log(response);
					}
			});
			e.preventDefault();
  
    	});


    });

</script>


@endsection('js')


