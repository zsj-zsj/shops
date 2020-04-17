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
                        <a href="#animatedModal" id="cart-menu"><i class="fa fa-shopping-basket"></i></a>
                        <span>2</span>
                    </div>
                </div>
                <div class="col s2">
                    <a href="contact.html"><i class="fa fa-envelope-o"></i></a>
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
                                    主页
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="product-list.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    Product List
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="shop-single.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    Single Shop
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="{{url('/mycollect')}}" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-heart"></i>
                                    </div>
                                    我的收藏
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="cart.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    Cart
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="checkout.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    Checkout
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="blog.html" class="button-link">	
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-bold"></i>
                                    </div>
                                    Blog
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="blog-single.html" class="button-link">	
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                    Blog Single
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="error404.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-hourglass-half"></i>
                                    </div>
                                    404
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
                                    Testimonial
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="about-us.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    About Us
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="contact.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    Contact
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="setting.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-cog"></i>
                                    </div>
                                    Settings
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-sign-in"></i>
                                    </div>
                                    <a href="{{url(env('PASSPORT').'/login')}}">登录</a>
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                    <a href="{{url(env('PASSPORT').'/reg')}}">注册</a>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 购物车列表 --}}
        <div class="menus" id="animatedModal">
                <div class="close-animatedModal close-icon">
                    <i class="fa fa-close"></i>
                </div>
                <div class="modal-content">
                    <div class="cart-menu">
                        <div class="container">
                            <div class="content">
                                <div class="cart-1">
                                </div>
                                <div class="divider"></div>
                                <div class="cart-2">
                                    <div class="row">
                                        <div class="col s5">
                                            <img src="/style/img/cart-menu2.png" alt="">
                                        </div>
                                        <div class="col s7">
                                            <h5><a href="">Fashion Men's</a></h5>
                                        </div>
                                    </div>
                                    <div class="row quantity">
                                        <div class="col s5">
                                            <h5>Quantity</h5>
                                        </div>
                                        <div class="col s7">
                                            <input value="1" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s5">
                                            <h5>Price</h5>
                                        </div>
                                        <div class="col s7">
                                            <h5>$20</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s5">
                                            <h5>Action</h5>
                                        </div>
                                        <div class="col s7">
                                            <div class="action"><i class="fa fa-trash"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="total">
                                <div class="row">
                                    <div class="col s7">
                                        <h5>Fashion Men's</h5>
                                    </div>
                                    <div class="col s5">
                                        <h5>$21.00</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s7">
                                        <h5>Fashion Men's</h5>
                                    </div>
                                    <div class="col s5">
                                        <h5>$21.00</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s7">
                                        <h6>Total</h6>
                                    </div>
                                    <div class="col s5">
                                        <h6>$41.00</h6>
                                    </div>
                                </div>
                            </div>
                            <button class="btn button-default">Process to Checkout</button>
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