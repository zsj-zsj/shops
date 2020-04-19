@extends('layout.app')
@section('title', '商品详情')
@section('content')
@include('layout.menu')
	
	<!-- cart -->
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>购物车列表</h3>
			</div>
			<div class="content">
				@foreach ($data as $v)
				<div class="cart-1" cart_id="{{$v->cart_id}}">
					<div class="row">
						<div class="col s5">
							<h5>商品图片</h5>
						</div>
						<div class="col s7">
							<img src="{{env('ADMIN')}}{{$v->goods_img}}" alt="">
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
							<h5>购买数量</h5>
						</div>
						<div class="col s7">
							{{$v->buy_num}}
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>价格</h5>
						</div>
						<div class="col s7">
							<h5>${{$v->goods_price}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s7">
							<h5><a href="javascript:;" id="delcart"><i class="fa fa-trash"></i></a></h5>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				@endforeach
				
			<div class="total">
				@foreach($data as $v)
				<div class="row">
					<div class="col s7">
						<h5><b style="color:red">{{$v->goods_name}}</b> 购买数量：{{$v->buy_num}}</h5>
					</div>
					<div class="col s5">
						<h5>￥{{$v->buy_num*$v->goods_price}}</h5>
					</div>
				</div>
				@endforeach
				<div class="row">
					<div class="col s7">
						<h6>总价</h6>
					</div>
					<div class="col s5">
						<h6>￥{{($total)}}</h6>
					</div>
				</div>
			</div>
			<button class="btn button-default">去结算</button>
		</div>
	</div>
    <!-- end cart -->
@include('layout.public')

<script src="/style/js/jquery.min.js"></script>
<script>
	$(document).on('click','#delcart',function(){
		var cart_id=$("#delcart").parents('.cart-1').attr('cart_id')
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
		$.post(
			"{{url('delcart')}}",
			{cart_id:cart_id},
			function(res){
				if(res.msg==000){
					alert(res.res)
					$("#delcart").parents('.cart-1').remove()
				}
				location.href="{{url('cartlist')}}"
			}
		),'json'
	})
</script>

@endsection