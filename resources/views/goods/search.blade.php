@extends('layout.app')
@section('title', '商品页')
@section('content')
@include('layout.menu')

	<!-- product -->
	<div class="section product product-list">
		<div class="container">
			<div class="pages-head">
				<h3>商品列表</h3>
			</div>
			<div id="ajax">
			<div class="input-field">
                <form action="{{url('/goodssecrch')}}" method="GET">
                    <input type="text" name="goods_name" value="{{$query['goods_name'] ?? ''}}" placeholder="请搜索需要的商品">
                    <button  class="btn button-default">搜索</button>
                </form>  
			</div>
			<div class="row">
                @foreach ($data as $v)
				<div class="col s6">
					<div class="content">
                        <img src="{{env('ADMIN')}}{{$v->goods_img}}">
						<h6>{{$v->goods_name}}</h6>
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
                    {{$data->appends($query)->links('vendor.pagination.default')}}
			</div>
		</div>
		</div>
	</div>
    <!-- end product -->
@include('layout.public')
<script src="/style/js/jquery.min.js"></script>
<script>
	$(document).on('click','.pagination a',function(){
		var url=$(this).attr('href')
		$.get(url,function(msg){
			$('#ajax').html(msg)
		})
		return false
	})
</script>

@endsection