@extends('frontend.layouts.app')
@section('title')
	Home | Shoppe
@endsection('title')
@section('content')
	<div style="text-align: center;">
		<h2 style="color: red;">Đặt hàng thành công</h2>
		<p>Cảm ơn bạn đã mua hàng ở hệ thống chũng tôi, vui lòng kiểm tra Email để biết thêm chi tiết</p>
		<p>Trở về trang chủ <a href="{{route('home')}}">tại đây</a></p>
	</div>

@endsection('content')

