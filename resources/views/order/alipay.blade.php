@extends('layout.app')
@section('title', '支付')
@section('content')
@include('layout.menu')
	
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>支付</h3>
			</div>
			<div class="content">
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>订单号：<b style="color:red">{{$data->order_no}}</b></h5>
						</div>
						<div class="col s7">
							<h5>提交时间：<b style="color:red">{{$data->created_at}}</b></h5>
						</div>
					</div>
				</div>
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							应付：￥<b style="color:red">{{$data->order_count}}</b>元
						</div>
					</div>
				</div>
				<div class="divider"></div>
		
				<a class="btn button-default">点击支付</a>
		</div>
	</div>
@include('layout.public')
@endsection