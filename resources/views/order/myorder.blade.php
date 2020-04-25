@extends('layout.app')
@section('title', '我的订单')
@section('content')
@include('layout.menu')
	
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>我的订单</h3>
			</div>
			<div class="content">
                @foreach($data as $v)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>订单号:{{$v->order_no ?? ''}}</h5>
						</div>
						<div class="col s7">
                            <h5>已付：{{$v->order_count ?? ''}}</h5>
						</div>
					</div>
				</div>
				<div class="divider"></div>
                @endforeach
		</div>
	</div>
@include('layout.public')
@endsection