@extends('layout.app')
@section('title', '我的收藏')
@section('content')
@include('layout.menu')

	<div class="wishlist section">
		<div class="container">
			<div class="pages-head">
				<h3>我的收藏</h3>
            </div>
			<div class="content">
					@foreach ($data as $v)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>商品图片</h5>
						</div>
						<div class="col s7">
							<img src="{{env('ADMIN')}}{{$v->goods_img}}" width="50" height="50">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>商品名称</h5>
						</div>
						<div class="col s7">
							<h5>{{$v->goods_name}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>商品库存</h5>
						</div>
						<div class="col s7">
							<h5>{{$v->goods_num}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>商品价格</h5>
						</div>
						<div class="col s7">
							<h5>${{$v->goods_price}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>取消收藏</h5>
						</div>
						<div class="col s7">
							<h5><a href="{{url('delcollect')}}?id={{$v->collect_id}}"><i class="fa fa-trash"></i></a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col 12">
							<button class="btn button-default">加入购物车</button>
						</div>
					</div>
					<div class="divider"></div>
				@endforeach
				</div>	
			</div>
		</div>
    </div>
    
@include('layout.public') 
@endsection