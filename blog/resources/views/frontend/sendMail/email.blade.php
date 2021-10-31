<div style="width: 600px;margin: 0 auto;">
	<div style="text-align: center;">
		<h2>Xin chào {{$auth->name}}</h2>
		<p>Cảm ơn bạn đã đặt hàng tại hệ thống chúng tôi</p>
	</div>
	<table border="1" cellspacing="0" cellpadding="10" style="width: 100%;">
		<thead>
			<tr>
				<th>STT</th>
				<th>Ảnh SP</th>
				<th>Tên SP</th>
				<th>Số lượng</th>
				<th>Giá</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cart as $va)
			<?php 
				$getIm = json_decode($va['image'], true); 
				$va['price'] = $va['price'] *(100 - $va['sale'])/100;
				$tong = $va['price'] * $va['qty'];
				$total = $total + $tong;
				$img = "https://raw.githubusercontent.com/thisishao/laravel_Baitap/main/blog/public/upload/product/22.jpg";
			?>
				<tr>
					<td></td>
					<td><img src="{{$img}}"></td>
					<td>{{$va['name']}}</td>
					<td>{{$va['qty']}}</td>
					<td>$ {{$va['price'] * $va['qty']}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div style="text-align: center;">
		<h3>Tổng giá trị đơn hàng là ${{$total}}</h3>
	</div>
</div>