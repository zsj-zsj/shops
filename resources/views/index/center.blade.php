@extends('layout.app')
@section('title', '个人中心')
@section('content')
@include('layout.menu')		
	<!-- testimonial -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>欢迎来到<b style="color:red">{{$user->name ?? ''}}</b>个人中心</h3>
				<a href="{{url(env('PASSPORT').'/loginexit')}}"><i class="fa fa-user-plus"></i>退出</a>
			</div>
			<div class="testimonial">
				<div id="owl-testimonial">
					<div class="item">
						<img src="/style/img/testimonial1.jpg" alt="">
						<p><i class="fa fa-user"></i></p>
						<h6><a href="{{url('/mycollect')}}">我的收藏</a></h6>
					</div>
					<div class="item">
						<img src="/style/img/testimonial2.jpg" alt="">
						<p><i class="fa fa-envelope-o"></i></li></p>
						<h6><a href="">查看订单</a></h6>
					</div>
					<div class="item">
						<img src="/style/img/testimonial3.jpg" alt="">
						<p><i class="fa fa-cog"></i></p>
						<h6><a href="{{url(env('PASSPORT').'/changepass')}}">修改密码</a></h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonial -->
@endsection