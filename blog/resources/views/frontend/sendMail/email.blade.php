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

<!-- cai cho checkout, thu tu lam nhu sau:
- tao them 1 nut order , va thay cai form hien tai bang` form dk thanh vien, neu member chua login thi cho phep dk tai do' , va dk xong thi thuc hien gui mail, gui mail xong thi luu thong tin vao table history(de sau nay admin quan ly)
- neu member dang o trang thai login thi k xuat hien tai form dk nua ma click order thi gui mail va luu history luon
Vic
chu k pai tach ra 2 nhu hien tai
Vic
va cai giao dien ben view: email.blade.php thi e phai co day du html nhu cai demo a gui kem` ay, e k gui html theo thi no k nhan css dc
Vic
Bao Vic
doan nay e tao nut order, click cho order thi cho form dk submit bang js, neu dc thi e ke thua cai form dk ben register qua, k can tao lai

8 người đắp xong đoạn đường trong 6 ngày  -->