@extends('layout.app')
@section('title', '商城')
@section('content')
@include('layout.menu')	
	<!-- slider -->
	<div class="slider">
		
		<ul class="slides">
			<li>
				<img src="/style/img/slide1.jpg" alt="">
				<div class="caption slider-content  center-align">
					<h2>WELCOME TO MSTORE</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="/style/img/slide2.jpg" alt="">
				<div class="caption slider-content center-align">
					<h2>JACKETS BUSINESS</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="/style/img/slide3.jpg" alt="">
				<div class="caption slider-content center-align">
					<h2>FASHION SHOP</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
		</ul>

	</div>
	<!-- end slider -->

	<!-- quote -->
	<div class="section quote">
		<div class="container">
			<h4>FASHION UP TO 50% OFF</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
		</div>
	</div>
	<!-- end quote -->

	<!-- product -->
	<div class="section product">
		<div class="container">
			<div class="section-head">
				<h4>TOP PRODUCT</h4>
				<div class="divider-top"></div>
				<div class="divider-bottom"></div>
			</div>
			
			<div class="row">
				@foreach ($data as $v)
				<div class="col s6">
					<div class="content">
						<img src="{{env('ADMIN')}}{{$v->goods_img}}" width="50" height="50">
						<h6><a href="{{url('goodsdetails')}}?id={{$v->goods_id}}">{{$v->goods_name}}</a></h6>
						<div class="price">
							${{$v->goods_price}}
						</div>
						<a href="{{url('goodsdetails')}}?id={{$v->goods_id}}">
						<button class="btn button-default">查看详情</button></a>
					</div>
				</div>
				@endforeach
			</div>
			
			<div class="pagination-product">
				<ul>
					<li class="active">{{$data->appends($query)->links()}}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end product -->

@include('layout.public')
@endsection