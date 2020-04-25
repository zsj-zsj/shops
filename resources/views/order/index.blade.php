@extends('layout.app')
@section('title', '结算')
@section('content')
@include('layout.menu')
	
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>结算</h3>
			</div>
			{{-- 商品 --}}
			<div class="content">
				@foreach($data as $v)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>商品图片</h5>
						</div>
						<div class="col s7">
							<p style="width=30%"><img src="{{env('ADMIN')}}{{$v->goods_img}}"></p>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>单价：{{$v->goods_price}}  数量：{{$v->buy_num}}</h5>
						</div>
						<div class="col s7">
							<h5>共：{{$v->buy_num*$v->goods_price}}</h5>
						</div>
					</div>
				</div>
				<div class="divider"></div>
			@endforeach

			{{-- 地址 --}}
			<div class="content">
				<b>已选择默认收货地址</b>&nbsp;&nbsp;<a href="{{url('address/index')}}"><b style="color:red">选择收货地址</b></a>  
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>收货人姓名：{{$address->add_name ?? ''}}</h5>
						</div>
						<div class="col s7">
							<h5>手机号：{{$address->add_mobile ?? ''}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>地址：{{$address->province ?? ''}}{{$address->city ?? ''}}{{$address->area ?? ''}}</h5>
						</div>
						<div class="col s7">
							<h5>详细地址：{{$address->detailed ?? ''}}</h5>
						</div>
					</div>
                </div>

			<div class="total">
				<div class="row">
					<div class="col s7">
						<h6>总价:￥{{$count}}</h6>
					</div>
				</div>
			</div>
			<a href="{{url('order/addorder')}}?goods_id={{Request()->goods_id}}&address_id={{$address->address_id ?? ''}}" class="btn button-default">确认结算</a>
		</div>
	</div>
@include('layout.public')
@endsection