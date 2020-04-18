@extends('layout.app')
@section('title', '商品详情')
@section('content')
@include('layout.menu')
	<!-- shop single -->
	<div class="pages section">
		<div class="container">
			<div class="shop-single">
                <img src="{{env('ADMIN')}}{{$data->goods_img}}" width="50" height="50">
				<h5>{{$data->goods_name}}</h5>
				<div class="price">${{$data->goods_price}}</div>
				<p>商品简介：{{$data->goods_desc}}</p> 
				库存：{{$data->goods_num}}
				<p>购买数量：
					<tr>
						<td>
							<button id="add">【+】</button>
							<input type="text" id="buy_num" value="1" style="width:100px; height=100px">
							<button id="less">【-】</button>
						</td>
					</tr>
				</p> 
				<button  class="btn button-default" id="addcart">加入购物车</button>
				<a href="{{url('/collect')}}?goods_id={{$data->goods_id}}"  class="btn button-default">收藏</a>
            </div>
				<div class="review">
					<h5><a href="{{url('commentlist')}}?id={{$data->goods_id}}">查看评论列表</a></h5>
				</div>	
				<div class="review-form">
					<div class="review-head">
						<p>输入评论内容</p>
					</div>
					<div class="row">
						<form class="col s12 form-details" action="{{url('comment')}}" method="post">
							<input type="hidden" name="goods_id" value="{{$data->goods_id}}">
							@csrf
							<div class="input-field">
								<textarea name="text" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="输入评论内容"></textarea>
							</div>
							<div class="form-button">
								<input type="submit" class="btn button-default" value="点击发布评论">
							</div>
						</form>
					</div>
				</div>
		</div>
	</div>

@include('layout.public')

<script src="/style/js/jquery.min.js"></script>
<script>
	//点加号
	$(document).on('click','#add',function(){
		var buy_num=parseInt($('#buy_num').val());
		var goods_num="{{$data->goods_num}}"
		goods_num=parseInt(goods_num)
		if(buy_num>=goods_num){
			alert('已超出库存');
			$("#buy_num").val(goods_num);
		}else{
			buy_num+=1;
			$('#buy_num').val(buy_num);
		}
	})

	//点减号
	$(document).on('click','#less',function(){
		var buy_num=parseInt($('#buy_num').val());
		if(buy_num<=1){
			$("#buy_num").val(1)
		}else{
			buy_num-=1;
			$('#buy_num').val(buy_num);
		}
	})

	//失去焦点
	$(document).on('blur','#buy_num',function(){
		var buy_num=parseInt($('#buy_num').val())
		var goods_num="{{$data->goods_num}}"
		goods_num=parseInt(goods_num)
		var reg=/^\d{1,}$/;
		if(!reg.test(buy_num) || parseInt(buy_num)<=1){
			$('#buy_num').val(1)
		}else if(parseInt(buy_num)>=goods_num){
			$('#buy_num').val(goods_num)
		}else{
			$('#but_num').val(parseInt(buy_num));
		}
	})

	//点击 加入购物车
	$(document).on('click','#addcart',function(){
		var buy_num=$("#buy_num").val()
		var goods_id="{{$data->goods_id}}"
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$.post(
			"{{url('/addcart')}}",
			{buy_num:buy_num,goods_id:goods_id},
			function(res){
				if(res.msg==000){
					alert(res.res)
				}else if(res.msg==222){
					alert(res.res)
				}else{
					alert(res.res)
					location.href="{{env('PASSPORT')}}/login"
				}
			},'json'
		)
	})
</script>
@endsection