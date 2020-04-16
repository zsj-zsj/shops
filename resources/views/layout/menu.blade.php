 {{-- 头部 --}}
 <div class="navbar-top">
    <div class="site-brand">
        <a href="{{url('/')}}"><h1>商城</h1></a>
    </div>
    <div class="side-nav-panel-right">
        <a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
    </div>
</div>


{{-- 右上角 --}}
<div class="side-nav-panel-right">
    <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
        <li class="profil">
            <img src="/style/img/profile.jpg" alt="">
            <h2>{{$user->name ?? ''}}</h2>
        </li>
        <li><a href="{{url(env('PASSPORT').'/changepass')}}"><i class="fa fa-cog"></i>修改密码</a></li>
        <li><a href="{{url(env('PASSPORT').'/loginexit')}}"><i class="fa fa-user-plus"></i>退出</a></li>
        <li><a href="{{url('/center')}}"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="{{url(env('PASSPORT').'/login')}}"><i class="fa fa-sign-in"></i>登录</a></li>
        <li><a href="{{url(env('PASSPORT').'/reg')}}"><i class="fa fa-user-plus"></i>注册</a></li>
    </ul>
</div>