<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اطلب | الان </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/ico/favicon.ico')}}">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}" type="text/css">
    {{-- Map --}}
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

{{--  Image Preview --}}
    <style>
        img{
            max-width:180px;
            }
            input[type=file]{
            padding:10px;
            
        }
      
        .Loading {
  position: relative;
  display: inline-block;
  width: 100%;
  height: 10px;
  background: #f1f1f1;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, .2);
  border-radius: 4px;
  overflow: hidden;
}

.Loading:after {
  content: '';
  position: absolute;
  left: 0;
  width: 0;
  height: 100%;
  border-radius: 4px;
  box-shadow: 0 0 5px rgba(0, 0, 0, .2);
  
}

@keyframes load {
  0% {
    width: 0;
    background: #a28089;
  }
  
  25% {
    width: 40%;
    background: #a0d2eb;
  }
  
  50% {
    width: 60%;
    background: #ffa8b6;
  }
  
  75% {
    width: 75%;
    background: #d0bdf4;
  }
  
  100% {
    width: 100%;
    background: #494d5f;
  }
}

@keyframes pulse {
  0% {
    background: #a28089;
  }
  
  25% {
    background: #a0d2eb;
  }
  
  50% {
    background: #ffa8b6;
  }
  
  75% {
    background: #d0bdf4;
  }
  
  100% {
    background: #494d5f;
  }
}


   </style>
    {{-- End Image Preview --}}
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <!-- Search In WebSite -->
            <li><span class="icon_search search-switch"></span></li>
            <!-- End Search In WebSite -->

            <!-- Heart In WebSite -->
            <li><a href="#"><span class="icon_heart_alt"></span>
                 <div class="tip">2</div>
                </a>
            </li>
            <!-- End Heart In WebSite -->

            <!-- Cart In WebSite -->
            <li><a href="#"><span class="icon_bag_alt"></span>
                 <div class="tip"></div>
                </a>
            </li>
            <!--End  Cart In WebSite -->

        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html">
                
                <h3>اطلب الان</h3>
                <!-- <img src="img/logo.png" alt=""> -->
            </a>
        </div>

        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="{{route('customer.login')}}">تسجيل دخول</a>
            <a href="#">تسجيل </a>
        </div>
        
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <h3>اطلب الان</h3>
                        <a href="{{route('main')}}">  </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>

                            <li class="{{is_active('home')}}"><a href="{{route('main')}}">الرئيسية</a></li>

                            {{-- Main Categories --}}
                           
                            @foreach (App\Models\MainCategory::where('id',1)->get() as $index => $category )
                                
                               @if(Auth::guard('customer')->check())
                                  <li class="{{is_active('category')}}"><a href="{{route('category',$category->id)}}">{{$category->name}}</a></li> 
                                @else
                                
                                
                                @endif

                            @endforeach
                            
                             {{-- End Main Categories --}}

                              {{--  Offers --}}
                              @if(Auth::guard('customer')->check())
                            <li  class="{{is_active('shop')}}"><a href="{{route('shop')}}">محلات</a></li>
                            @endif
                             {{-- End Offers --}}
                             
                             {{-- Check Order --}}
                            <li ><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./product-details.html">Product Details</a></li>
                                @if(Auth::guard('customer')->check())
                                    
                                     <li ><a class="cart" href="">سلة المشتريات</a></li> 
                                @else
                                 
                                @endif    
                                    <li><a href="./checkout.html">Checkout</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                             {{-- Check Order --}}

                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        
                        </ul>
                    </nav>
                </div>
                {{-- Auth && Guest Login --}}
                <div class="col-lg-3">
                    <div class="header__right">
                        
                        <div class="header__right__auth">
                            
                                <!-- Authentication Links -->
                            
                            @guest('customer')
                                
                                        <a href="{{route('customer.login')}}">تسجيل دخول/</a>
                                
                                        <a href="{{route('customer.register')}}">تسجيل</a>
                        
                            @else
                                @if(Auth::guard('customer')->check())
                                    
                                    
                                       {{--  {{Auth::guard('customer')->user()->name}}
                                        <img style="width: 65px; height: 50px; border-radius:50%;" src="{{Auth::guard('customer')->user()->logo}}">
                                        
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('customer.logout') }}">
                                                تسجيل خروج
                                            </a>
        
                                        
                                        </div> --}}
                                    
                                        <li>{{Auth::guard('customer')->user()->name}}
                                        <img style="width: 65px; height: 50px; border-radius:50%;" src="{{Auth::guard('customer')->user()->logo}}">

                                            <ul class="dropdown">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('customer.logout') }}">
                                                        تسجيل خروج
                                                    </a>
                                                </li>
                                           
                                            </ul>
                                        </li>
                                @endif  
                            
                            @endguest    
                            

                        </div>
                    
                                
                        <ul class="header__right__widget">

                            <li><span class="icon_search search-switch"></span></li>

                            <!-- Cart In WebSite -->
                         @if(Auth::guard('customer')->check())

                            {{-- <li ><a class="cart" href="{{route('order.cart', Auth::guard('customer')->user()-> id)}}">
                                <span class="icon_bag_alt"></span>
                                    <div class="tip">0</div>
                                </a>
                            </li> --}}

                            <li ><a class="cart" href="">
                                <span class="icon_bag_alt"></span>
                                    <div class="tip">0</div>
                                </a>
                            </li>
                         @else
                         
                            <li><a href="#"><span class="icon_bag_alt"></span>
                                    <div class="tip">0</div>
                                </a>
                            </li>   
                         @endif   
                            <!--End  Cart In WebSite -->

                        </ul>

                    </div>

                   
                </div>
                {{-- End Of Login --}}
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

