@extends('layout.app')
@section('title', '我的收藏')
@section('content')
@include('layout.menu')

	<div class="wishlist section">
		<div class="container">
			<div class="pages-head">
				<h3>收货地址</h3>
            </div>
			<div class="content">
				<div class="cart-1">
                    @foreach($data as $v)
					<div class="row">
						<div class="col s5">
							<h5>收货人姓名</h5>
						</div>
						<div class="col s7">
							{{$v['add_name']}}
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>手机号</h5>
						</div>
						<div class="col s7">
							<h5>{{$v['add_mobile']}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>地址</h5>
						</div>
						<div class="col s7">
							<h5>{{$v['province']}}{{$v['city']}}{{$v['area']}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>详细地址</h5>
						</div>
						<div class="col s7">
							<h5>{{$v['detailed']}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5><i class="fa fa-trash" id="del"></i></a></h5>
                        </div>
                        <div class="col s7">
                            <h5><a href="{{url('address/edit')}}?id={{$v['address_id']}}" style="color:red">修改信息</a></h5>
                        </div>
					</div>
					<div class="row">
						<div class="col 12">
							@if($v['is_detailed']==2)
							<button class="btn button-default">已设置为默认地址</button>
							@else
							<a href="{{url('address/detailed')}}?id={{$v['address_id']}}" class="btn button-default">设置为默认收货地址</a>
							@endif
						</div>
					</div>
                    <div class="divider"></div>
                    @endforeach
                </div>
                <p style="color:red"><a href="{{url('address/create')}}">添加收货地址</a></p>	
			</div>
		</div>
    </div>
    
@include('layout.public')

<script src="/style/js/jquery.min.js"></script>
<script>
	//删除
	$(document).on('click','#del',function(){
		var address_id="{{$v['address_id'] ?? ''}}"
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
		$.post(
			"{{url('address/delete')}}",
			{address_id:address_id},
			function(res){
				if(res.msg==000){
					alert(res.res)
					// $('#del').parents(".cart-1").remove()
					location.href="{{url('address/index')}}"
				}
			}
		),'json'
	})
</script>

@endsection