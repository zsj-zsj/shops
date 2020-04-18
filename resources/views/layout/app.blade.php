<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="HandheldFriendly" content="True">

        <link rel="stylesheet" href="/style/css/materialize.css">
        <link rel="stylesheet" href="/style/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/style/css/normalize.css">
        <link rel="stylesheet" href="/style/css/owl.carousel.css">
        <link rel="stylesheet" href="/style/css/owl.theme.css">
        <link rel="stylesheet" href="/style/css/owl.transitions.css">
        <link rel="stylesheet" href="/style/css/fakeLoader.css">
        <link rel="stylesheet" href="/style/css/animate.css">
        <link rel="stylesheet" href="/style/css/style.css">
        <link rel="shortcut icon"href="/style/img/favicon.png">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 

    </head>
    <body>

        {{-- 全局最下面 --}}
	    <div class="navbar-bottom">
            <div class="row">
                <div class="col s2">
                    <a href="{{url('/')}}"><i class="fa fa-home"></i></a>
                </div>
                <div class="col s2">
                    <a href="{{url('/mycollect')}}"><i class="fa fa-heart"></i></a>
                </div>
                <div class="col s4">
                    <div class="bar-center">
                        <a href="{{url('cartlist')}}"><i class="fa fa-shopping-basket"></i></a>
                    </div>
                </div>
                <div class="col s2">
                    <a href=""><i class="fa fa-envelope-o"></i></a>
                </div>
                <div class="col s2">
                    <a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>

        {{-- 全局的菜单 --}}
	    <div class="menus" id="animatedModal2">
            <div class="close-animatedModal2 close-icon">
                <i class="fa fa-close"></i>
            </div>
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col s4">
                            <a href="{{url('/')}}" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <a href="{{url('/')}}">主页</a> 
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="{{url('goodssecrch')}}" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    <a href="{{url('goodssecrch')}}">商品页</a>
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="{{url('/mycollect')}}" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-heart"></i>
                                    </div>
                                        <a href="{{url('/mycollect')}}">我的收藏</a> 
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="{{url('cartlist')}}" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <a href="{{url('cartlist')}}">购物车</a> 
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="{{url(env('PASSPORT').'/login')}}" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-sign-in"></i>
                                    </div>
                                        <a href="{{url(env('PASSPORT').'/login')}}">登录</a>
                                    </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="{{url(env('PASSPORT').'/reg')}}" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                        <a href="{{url(env('PASSPORT').'/reg')}}">注册</a>
                                    </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="testimonial.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-support"></i>
                                    </div>
                                        收货地址
                                    </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
        <script src="/style/js/jquery.min.js"></script>
        <script src="/style/js/materialize.min.js"></script>
        <script src="/style/js/owl.carousel.min.js"></script>
        <script src="/style/js/fakeLoader.min.js"></script>
        <script src="/style/js/animatedModal.min.js"></script>
        <script src="/style/js/main.js"></script>
    </body>
</html>