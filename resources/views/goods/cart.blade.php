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
			<a href="javascript:;"><input type="checkbox" name="1" id="allBox"/> 全选</a>
			<div class="content">
				@foreach ($data as $v)	
				<div class="cart-1" goods_id="{{$v->goods_id}}">
					选中去结算<input type="checkbox" name="1" class="box"/>
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
							<h5>收藏数量</h5>
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

			<a herf="javascript:;" id="order" class="btn button-default">去结算</a>
		</div>
	</div>
    <!-- end cart -->
@include('layout.public')

<script src="/style/js/jquery.min.js"></script>
<script>
	//结算
	$(document).on('click','#order',function(){
		var goods_id='';
        var _box=$('.box:checked');
        if(_box.length>0){
            _box.each(function(index){
			goods_id+=$(this).parents('.cart-1').attr('goods_id')+',';
			console.log(goods_id)
        })
            goods_id=goods_id.substr(0,goods_id.length-1);
            location.href="{{url('order/index')}}?goods_id="+goods_id;
        }else{
            alert('请至少选择一件商品');
        }
    })

	//全选
	$(document).on('click','#allBox',function(){
        var _this=$(this);
        var status=_this.prop('checked');
        $(".box").prop('checked',status);
    })
	
	//删除购物车
	$(document).on('click','#delcart',function(){
		var cart_id="{{$v->cart_id ?? ''}}"
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