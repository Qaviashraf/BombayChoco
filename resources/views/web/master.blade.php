<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="description" content="agency, ecommerce"> --}}
    {{-- <meta name="author" content="Md. Siful Islam, Jtheme"> --}}
    <!-- Add the following line to prevent indexing by search engines -->
    {{-- <meta name="robots" content="noindex"> --}}
    {{-- <title>Bombay Choconuts</title> --}}
    {{-- <title>@yield('title')</title> --}}
    <!-- Include meta tags -->
    <meta name="robots" content="noindex">
    @yield('meta_tags')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="/assets/ico/favicon.ico">

    <!-- Font Icon -->
    <link href="/assets/css/plugin/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- CSS Global -->
    <link href="/assets/css/plugin/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/plugin/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/plugin/animate.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/plugin/subscribe-better.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/plugin/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="/assets/css/theme.css" rel="stylesheet" type="text/css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Color CSS -->
    <style>
        #overlay {
            z-index: 1;
            width: 500px !important;
        margin-left: 30px;
            height: 400px;
            display: none; /* Set initial display to none */
            position: absolute;
            background-repeat: no-repeat;
            background-size: 600px 600px; /* Adjust the background size according to your needs */
        }
        .details {
            position: relative;
            width: 100%;
            height: 100%;
            float: left;
        }

        * {
            box-sizing: border-box;
        }


        $speed: 250ms;

        body {
            background: #F3F3F3;
            padding: 0;
            margin: 0;
            overflow-x: hidden;

            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 20px;
        }

        body.open {
            overflow-y: hidden;
        }

        .shop {
            position: relative;
            z-index: 5;
        }

        .shop__header {
            box-sizing: border-box;
            position: fixed;
            background: rgba(255, 255, 255, 0.9);
            width: 100%;
            padding: 15px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .shop__products {
            padding-top: 70px;
        }

        .shop__title {
            display: block;
            margin: 0;
            float: left;

            font-size: 30px;
            line-height: 40px;
        }

        .shop__text {
            display: block;
            padding: 0;
            margin: 0;
            float: right;

            .button {
                padding: 10px 15px;
            }
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px 0 20px 20px;
        }

        .products__item {
            width: 290px;
        }

        .product {
            background: #FFF;
            padding: 30px 15px;
            margin: 0 20px 20px 0;
            border-radius: 5px;
            text-align: center;
        }

        .product__title {
            font-weight: bold;
            font-size: 20px;
            margin: 0 0 15px 0;
        }

        .product__text {
            margin: 0;
        }

        .button {
            display: inline-block;
            background: #39C;
            padding: 5px 10px;
            border-radius: 3px;

            font-weight: bold;
            font-size: 14px;
            text-decoration: none;
            color: #FFF;
        }

        .button--light {
            background: #FFF;
            color: #F00;
        }

        .cart {
            position: fixed;
            background: #F3F3F3;
            width: 400px;
            max-width: 90%;
            height: 100%;
            top: 0;
            right: 0;
            box-shadow: -2px 0 4px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transform: translate(500px, 0);
            transition: transform $speed ease-in-out;
            z-index: 20;
        }

        body.open .cart {
            transform: translate(0, 0);
        }

        .cart__header {
            box-sizing: border-box;
            position: absolute;
            background: rgba(255, 255, 255, 0.9);
            width: 100%;
            padding: 15px 15px;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 2;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);

            .cart__text {
                float: right;
            }
        }

        .cart__title {
            font-size: 20px;
            line-height: 40px;
            margin: 0;
            float: left;
        }

        .cart__products {
            box-sizing: border-box;
            position: absolute;
            width: 100%;
            height: 100%;
            padding: 70px 0;
            overflow-x: hidden;
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
            z-index: 1;

            article {
                padding: 15px;
                border-bottom: 1px dotted #CCC;

                h1 {
                    font-size: 16px;
                    line-height: 20px;
                    margin: 0;
                }

                p {
                    font-size: 14px;
                    margin: 0;

                    a {
                        color: #F00
                    }
                }
            }
        }

        .cart__product {
            display: none;
        }

        .cart__empty {
            padding: 30px 15px;
            margin: 0;
            font-style: italic;
            text-align: center;

            &.hide {
                display: none;
            }
        }

        .cart__footer {
            box-sizing: border-box;
            position: absolute;
            background: rgba(255, 255, 255, 0.9);
            width: 100%;
            padding: 15px;
            left: 0;
            bottom: 0;
            z-index: 2;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.2);
            text-align: right;
        }

        .cart__text {
            margin: 0;

            .button {
                padding: 10px 15px;
            }
        }

        .lightbox {
            position: fixed;
            background: #000;
            width: 0;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 10;
            opacity: 0;
            transition: opacity $speed ease-in-out, width 0ms ease-in-out $speed;
        }

        body.open .lightbox {
            width: 100%;
            opacity: 0.8;
            transition: opacity $speed ease-in-out, width 0ms ease-in-out;
        }

        .modal-backdrop.fade.in {
            display: none;
        }

        .productCards {
            display: flex;
            /* flex-wrap: nowrap; Or change to 'wrap' if you want the cards to wrap to the next line on smaller screens */
            /* overflow-x: auto; Enable horizontal scrolling for overflowed cards */
            /* scroll-snap-type: x mandatory; Snap cards to the scroll container */
        }

        .item {
            flex: 0 0 auto; /* Don't allow items to grow or shrink */
            /* margin-right: 15px; Add spacing between items */
            /* scroll-snap-align: start; Align items to the start of the container when scrolling */
        }
    </style>

</head>


        <!-- CONTENT AREA -->
        <div class="top-header">
            <div class="row">
                <div class="col-lg-5">
                    <a href="/specialoffers">
                        <p>SUPER DEALS <span style="padding-left:10px;"> FEATURE PRODUCTS <span
                                    style="padding-left:10px;"> TRENDING PRODUCTS <span style="padding-left:10px;"> GIFT
                                        BASKETS</p>
                    </a>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-2 locator">
                    <a href="/contact">
                        <p> <i class="fa fa-user-plus" aria-hidden="true"></i>
                            STORE LOCATOR</p>
                    </a>
                    <span>
                </div>
                <div class="col-lg-2 track">
                    <a href="{{ route('trackOrders') }}">
                        <p
                            style="
                    border-right: 1px solid white;
                    border-left: 1px solid white;
                        ">
                            <i class="fa fa-heart" aria-hidden="true">&nbsp;
                            </i>TRACK YOUR ORDER
                        </p>
                    </a>
                </div>
                <div class="col-lg-1">
                    @if (Auth::user())
                        <a href="/my-account">
                            <p style="text-align: start;">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                {{Auth::user()->name}}
                            </p>
                        </a>
                    @else
                        <a href="/wishlist">
                            <p style="text-align: start;">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                ACCOUNT
                            </p>
                        </a>
                    @endif
                    
                </div>


            </div>
        </div>
        <!-- Main Header Start -->
        <header class="main-head">
            <div class="container-fluid rel-div">
                <!-- <div class="pattern">
                        <img alt="" src="assets/img/icons/white-pattern.png" />
                    </div> -->

                <div class="col-lg-3 col-sm-8">
                    <div class="main-logo">
                       <a href="/"> <img src="{{ asset('web-assets/images/logo/bombaylogo.png') }}" alt=""></a>

                    </div>
                </div>
                <div class="col-lg-6 responsive-menu">
                    @php
                        $parentCategories = App\Models\ProductCategory::parentCategories()->get();
                        $products = App\Models\Product::all();
                    @endphp
                    <form action="{{ route('searchByProduct') }}" method="GET">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <select id="categorySelect" name="category_id" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <ul class="dropdown-menu scrollable-dropdown" role="menu" id="categories">
                                        <option value="all" class="caret">All Categories</option>
                                        @foreach ($parentCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </ul>
                                </select>
                            </div>
                            {{-- <select name="id" class="form-control">
                                    <option value="" id="search" >Search Product.....</option>
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->title}}</option>
                                    @endforeach
                                </select> --}}
                            <input type="text" class="form-control" name="name" 
                                placeholder="Search  For Products..." value="{{ isset($searchValue) ? $searchValue : old('name') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div style="   padding-top: 10px;   font-size: 20px; text-align: center;" class="col-lg-1 ">
                    @if (Auth::user())
                        <a
                            href="/wishlist-product"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    @else
                        <a
                            href="/wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    @endif
                </div>
                <div class="col-lg-2 col-sm-4 cart-megamenu">
                    <div class="cart-hover modal-open" id="openCartButton">
                        <a id="openCartButton" href=""> <img src="{{asset('assets/img/icons/cart-icon.png')}}" /> </a>
                        <span class="cnt crl-bg">{{ Cart::getTotalQuantity() }}</span>
                        @if (Cart::getTotal())
                            <span class="price">Rs {{ Cart::getTotal() }}</span>
                        @endif
                        @if (count(Cart::getContent()) > 0)
                            <ul class="pop-up-box cart-popup">
                                @foreach (Cart::getContent() as $item)
                                    <li class="cart-list">
                                        <div class=""> <img
                                            src="{{asset('images/product-images/'.$item->photo)}}"
                                                alt=""> </div>
                                        <div class="cart-title">
                                            <div class="fsz-16">
                                                <a href="/#"> {{ $item->name }}</a>
                                            </div>
                                            <div class="price">
                                                <strong class="clr-txt">Rs {{ $item->price }} </strong>
                                            </div>
                                        </div>
                                        <div class="close-icon">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button type="submit"><i class="fa fa-trash clr-txt"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach

                                <li class="cart-list buttons">
                                    <div class="pull-left">
                                        <a href="{{ route('cart') }}" class="theme-btn-sm-2">View Cart</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/checkout" class="theme-btn-sm-3"> Checkout </a>
                                    </div>
                                </li>
                            </ul>

                        @endif
                    </div>


                </div>
        </header>
        <div class="down-header">
            <div class="row">
                <div class="col-lg-9 col-md-6 col-sm-12 responsive-menu">

                    <div class="responsive-toggle fa fa-bars"> </div>
                    <nav class="fix-navbar" id="primary-navigation">
                        <ul class="primary-navbar">
                            <li class="dropdown active">
                                <a href="/">Home</a>
                                {{-- <ul class="dropdown-menu">    
                        <li><a href="/"> Home 1 </a></li> 
                        <li><a href="/index-2"> Home 2 </a></li> 
                        <li><a href="/index-3"> Home 3 </a></li>
                        <li><a href="/index-4"> Home 4 </a></li>
                    </ul> --}}
                            </li>
                            <li><a href="/about-us">About Us</a></li>
                            <li class="">
                                <!-- <a href="/shop">Shop</a>
                                {{-- <ul class="dropdown-menu">    
                        <li><a href="/shop"> shop </a></li> 
                        <li><a href="/shop-2"> shop 2 </a></li> 
                        <li><a href="/shop-single"> shop single </a></li>  
                        <li><a href="/my-account"> my account </a></li> 
                    </ul> --}} -->
                    <span class="nav-trigger">
            <a class="menu-toggle" href="#">
                Shop
                <i class="fa fa-angle-down arrow-d" aria-hidden="true"></i>
            </a>
        </span>
                            </li>
                            {{-- <li class="dropdown"> --}}
                                {{-- <a href="/blog">Blog</a> --}}
                                {{-- <ul class="dropdown-menu">    
                        <li><a href="/blog"> blog </a></li>
                        <li><a href="/blog-single"> blog single </a></li>                  
                    </ul> --}}
                            {{-- </li> --}}
                            <li><a href="/contact">Contact Us</a></li>

                            <li class="dropdown">
                                <a href="/giftbundle">Gift Bundle</a>
                            </li>
                            <li class="dropdown">
                                <a href="/specialoffers">Special Offers</a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <div class="col-lg-3 cart-megamenu">
    <div class="mega-submenu">
        
        <div class="mega-dropdown-menu">
            <div class="category-columns">
                @foreach($categories as $category)
                    @if($category->childCategories->isNotEmpty())
                        <div class="category-column">
                            <h3 class="category-title">{{ $category->name }}</h3>
                            <ul class="subcategory-list">
                                @foreach($category->childCategories as $subCategory)
                                    <li>
                                        <!-- URL pointing to '/category-name' -->
                                        <a href="{{ url('products/' . $category->slug) }}">
                                            {{ $subCategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="line"></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>



                        </div>

                    </div>
                    <div class="responsive-toggle fa fa-bars"> </div>
                </div>
            </div>
        </div>
        </div>
        <!-- / Main Header Ends -->
        <section class="mob-top-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p>SUPER DEALS</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p>FEATURE PRODUCTS</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p>TRENDING PRODUCTS</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p>GIFT BASKETS</p>
                </div>
            </div>
        </section>
        <section class="mob-top-search"   style="
        text-align: center !important;
    ">
            <div class="search-wrap">
            <form action="{{ route('searchByProduct') }}" method="GET">
                <input type="hidden" name="category_id" value="all">
                <input class="form-control" name="name" placeholder="Search" value="{{ isset($searchValue) ? $searchValue : old('name') }}">
                <button class="btn" type="submit"> <i class="fa fa-search"></i> </button>
            </form>
            </div>
        </section>
        <section class="mob-menu-header">
            <div class="row">
                <div class="col-lg-10 col-md-6 col-sm-12 responsive-menu">
                    <div class="responsive-toggle fa fa-bars"> </div>
                    <div class="row mind">
                        <div class="col-lg-4 locator">
                            <a href="/giftbundle"> <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <p>SIGN IN</p>
                            </a>
                            <span>
                        </div>
                        <div class="col-lg-4 track">
                            <i class="fa fa-heart" aria-hidden="true">&nbsp;
                            </i>
                            <p>TRACK ORDER</p>
                        </div>
                        <div class="col-lg-4 account">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            @if (Auth::user())
                                <p style="text-align: start;">{{Auth::user()->name}}</p>
                            @else
                                <p style="text-align: start;">ACCOUNT</p>

                            @endif
                        </div>
                    </div>
                    <section id="marzen" class="tab-panel">



                        <div class="tabset">
                            <!-- Tab 1 -->

                            <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
                            <label for="tab1" class="menu-tabs1">Menu</label>
                            <!-- Tab 2 -->
                            <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
                            <label for="tab2" class="menu-tabs2">Categories</label>

                            <!-- Tab 3 -->


                            <div class="tab-panels">
                                <section id="marzen" class="tab-panel">

                                    <nav class="fix-navbar" id="primary-navigation">
                                        <ul class="primary-navbar">
                                            <li class="dropdown active">
                                                <a href="/">Home</a>
                                                {{-- <ul class="dropdown-menu">    
                                    <li><a href="/"> Home 1 </a></li> 
                                    <li><a href="/index-2"> Home 2 </a></li> 
                                    <li><a href="/index-3"> Home 3 </a></li>
                                    <li><a href="/index-4"> Home 4 </a></li>
                                </ul> --}}
                                            </li>
                                            <li><a href="/about-us">About Us</a></li>
                                            <li class="dropdown">
                                                <a href="/shop">Shop</a>
                                                {{-- <ul class="dropdown-menu">    
                                    <li><a href="/shop"> shop </a></li> 
                                    <li><a href="/shop-2"> shop 2 </a></li> 
                                    <li><a href="/shop-single"> shop single </a></li>  
                                    <li><a href="/my-account"> my account </a></li> 
                                </ul> --}}
                                            </li>
                                            {{-- <li class="dropdown">
                                                <a href="/#" class="dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true">Blog</a> --}}
                                                {{-- <ul class="dropdown-menu">    
                                    <li><a href="/blog"> blog </a></li>
                                    <li><a href="/blog-single"> blog single </a></li>                  
                                </ul> --}}
                                            {{-- </li> --}}
                                            <li><a href="/contact">Contact Us</a></li>

                                            <li class="dropdown">
                                                <a href="/giftbundle">Gift Bundle</a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="/specialoffers">Special Offers</a>
                                            </li>

                                        </ul>
                                    </nav>
                                </section>
                                <section id="rauchbier" class="tab-panel">
    <ul>
        @foreach($categories as $category)
            @if($category->childCategories->isNotEmpty())
                <li class="dropdown-item">
                    {{ $category->name }}
                    <i class="fa fa-chevron-down"></i>
                    <ul class="dropdown-content">
                        @foreach($category->childCategories as $subCategory)
                            <li>
                                <!-- URL pointing to '/category-name' -->
                                <a href="{{ url('products/' . $category->slug) }}">
                                    {{ $subCategory->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    </ul>
</section>



                            </div>
                        </div>




                </div>
                <div class="col-lg-2 cart-megamenu">
                    {{-- <div class="mega-submenu">
    
    <span class="nav-trigger">
        <a class="menu-toggle" href="/#"> <img src="assets/img/icons/menu.png" alt="" /> </a>
    </span>
    <div class="mega-dropdown-menu">
        <a class="menu-toggle fa fa-close" href="/#">  </a>
        <div class="slider-mega-menu">
            <div class="menu-block">
                <div class="menu-caption">                                                               
                    <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Fruits</strong> </h2>
                    <ul class="sub-list">
                        <li> <a href="/#">Banana</a> </li>
                        <li> <a href="/#">Water Melon </a> </li>
                        <li> <a href="/#">Blackberry </a> </li>
                        <li> <a href="/#">Plume</a> </li>
                        <li> <a href="/#">Orange</a> </li>
                        <li> <a href="/#">Lemon</a> </li>
                        <li> <a href="/#">Pineapple</a> </li>
                        <li> <a href="/#">Apple</a> </li>
                        <li> <a href="/#">Kiwi</a> </li>
                    </ul>
                    <h2 class="title"> <a href="/#" class="clr-txt"> All Fruits </a> </h2>
                </div>
                <div class="menu-img">
                    <img alt="" src="assets/img/extra/menu-1.png" />
                </div>
            </div>  
            <div class="menu-block">
                <div class="menu-caption">                                                               
                    <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Vegetables</strong> </h2>
                    <ul class="sub-list">
                        <li> <a href="/#">Cabbage</a> </li>
                        <li> <a href="/#">Garlic </a> </li>
                        <li> <a href="/#">Onion </a> </li>
                        <li> <a href="/#">Plume</a> </li>
                        <li> <a href="/#">Carrot</a> </li>
                        <li> <a href="/#">Papper</a> </li>
                        <li> <a href="/#">Mushrome</a> </li>
                        <li> <a href="/#">Apple</a> </li>
                        <li> <a href="/#">Kiwi</a> </li>
                    </ul>
                    <h2 class="title"> <a href="/#" class="clr-txt"> All Vegetables </a> </h2>
                </div>
                <div class="menu-img">
                    <img alt="" src="assets/img/extra/menu-2.png" />
                </div>
            </div>  
            <div class="menu-block">
                <div class="menu-caption">                                                               
                    <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Dread Juices</strong> </h2>
                    <ul class="sub-list">
                        <li> <a href="/#">Banana Juice</a> </li>
                        <li> <a href="/#">Water Melon Juice</a> </li>
                        <li> <a href="/#">Blackberry Juice</a> </li>
                        <li> <a href="/#">Plume Juice</a> </li>
                        <li> <a href="/#">Orange Juice</a> </li>
                        <li> <a href="/#">Lemon Juice</a> </li>
                        <li> <a href="/#">Pineapple Juice</a> </li>
                        <li> <a href="/#">Apple Juice</a> </li>
                        <li> <a href="/#">Kiwi Juice</a> </li>
                    </ul>
                    <h2 class="title"> <a href="/#" class="clr-txt"> All Dread juices </a> </h2>
                </div>
                <div class="menu-img">
                    <img alt="" src="assets/img/extra/menu-3.png" />
                </div>
            </div>  
            <div class="menu-block">
                <div class="menu-caption">                                                               
                    <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Juices</strong> </h2>
                    <ul class="sub-list">
                        <li> <a href="/#">Banana Juice</a> </li>
                        <li> <a href="/#">Water Melon Juice</a> </li>
                        <li> <a href="/#">Blackberry Juice</a> </li>
                        <li> <a href="/#">Plume Juice</a> </li>
                        <li> <a href="/#">Orange Juice</a> </li>
                        <li> <a href="/#">Lemon Juice</a> </li>
                        <li> <a href="/#">Pineapple Juice</a> </li>
                        <li> <a href="/#">Apple Juice</a> </li>
                        <li> <a href="/#">Kiwi Juice</a> </li>
                    </ul>
                    <h2 class="title"> <a href="/#" class="clr-txt"> All Fresh Juices </a> </h2>
                </div>
                <div class="menu-img">
                    <img alt="" src="assets/img/extra/menu-1.png" />
                </div>
            </div>  
            <div class="menu-block">
                <div class="menu-caption">                                                               
                    <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Breads</strong> </h2>
                    <ul class="sub-list">
                        <li> <a href="/#">Banana</a> </li>
                        <li> <a href="/#">Water Melon </a> </li>
                        <li> <a href="/#">Blackberry </a> </li>
                        <li> <a href="/#">Plume</a> </li>
                        <li> <a href="/#">Orange</a> </li>
                        <li> <a href="/#">Lemon</a> </li>
                        <li> <a href="/#">Pineapple</a> </li>
                        <li> <a href="/#">Apple</a> </li>
                        <li> <a href="/#">Kiwi</a> </li>
                    </ul>
                    <h2 class="title"> <a href="/#" class="clr-txt"> All Fresh Bread </a> </h2>
                </div>
                <div class="menu-img">
                    <img alt="" src="assets/img/extra/menu-5.png" />
                </div>
            </div>  
            <div class="menu-block">
                <div class="menu-caption">                                                               
                    <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Tea</strong> </h2>
                    <ul class="sub-list">
                        <li> <a href="/#">Cabbage</a> </li>
                        <li> <a href="/#">Garlic </a> </li>
                        <li> <a href="/#">Onion </a> </li>
                        <li> <a href="/#">Plume</a> </li>
                        <li> <a href="/#">Carrot</a> </li>
                        <li> <a href="/#">Papper</a> </li>
                        <li> <a href="/#">Mushrome</a> </li>
                        <li> <a href="/#">Apple</a> </li>
                        <li> <a href="/#">Kiwi</a> </li>
                    </ul>
                    <h2 class="title"> <a href="/#" class="clr-txt"> All Freash Tea </a> </h2>
                </div>
                <div class="menu-img">
                    <img alt="" src="assets/img/extra/menu-6.png" />
                </div>
            </div> 
        </div>
    </div>
    </div> --}}
                    <div class="responsive-toggle fa fa-bars"> </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="main-logo">
                        <img src="{{ asset('web-assets/images/logo/bombaylogo.png') }}" alt="">

                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 cart-megamenu ">
                    <div class="cart-hover">
                        <a href="/#"> <img alt="" src="assets/img/icons/cart-icon.png" /> </a>
                        <span class="cnt crl-bg">{{ Cart::getTotalQuantity() }}</span>
                        @if (Cart::getTotal())
                            <span class="price">Rs {{ Cart::getTotal() }}</span>
                        @endif
                        @if (count(Cart::getContent()) > 0)
                            <ul class="pop-up-box cart-popup">
                                @foreach (Cart::getContent() as $item)
                                    <li class="cart-list">
                                        <div class="cart-img"> <img
                                                src="{{ asset('web-assets/images/giftbasket/1.png') }}"
                                                alt=""> </div>
                                        <div class="cart-title">
                                            <div class="fsz-16">
                                                <a href="/#"> {{ $item->name }}</a>
                                            </div>
                                            <div class="price">
                                                <strong class="clr-txt">Rs {{ $item->price }} </strong>
                                            </div>
                                        </div>
                                        <div class="close-icon">
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button type="submit"><i class="fa fa-trash clr-txt"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach

                                <li class="cart-list buttons">
                                    <div class="pull-left">
                                        <a href="{{ route('cart') }}" class="theme-btn-sm-2">View Cart</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/checkout" class="theme-btn-sm-3"> Checkout </a>
                                    </div>
                                </li>
                            </ul>

                        @endif
                    </div>


                </div>
            </div>
        </section>
        @yield('content');

        <!-- / CONTENT AREA -->
        <!-- Subscribe Popup-Dark -->
        {{-- <section id="subscribe-popups" class="subscribe-me popups-wrap" style="background-image:url({{asset('web-assets/images/Nuts/1.png')}})">                
    <div class="modal-content">   
        <button type="button" class="sb-close-btn close popup-cls"> <i class="fa-times fa clr-txt"></i> </button>
        <div class="subscribe-wrap">                                                                   
            <div class="main-logo">
                <a href="/"> <img alt="" src="assets/img/logo/main-logo.png" />  </a>
            </div>

            <div class="title-wrap">
                <h2 class="section-title"> <strong>Subscribe Newsletter</strong> </h2>
                <h4 class="fsz-12"> Join our newsletter for free & get latest news weekly </h4>
            </div>

            <form class="newsletter-form">
                <div class="form-group">
                    <input class="form-control" placeholder="enter your email address" required="" type="text">                                                                                     
                </div>
                <div class="form-group">                                               
                    <button class="theme-btn upper-text" type="submit"> <strong> subscribe </strong> </button>                                            
                </div>
            </form>
        </div>
    </div>
</section> --}}
        <!-- / Subscribe Popup-Dark -->
        <!-- FOOTER -->
        <footer class="page-footer">
            <section class="sec-space light-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 footer-widget">
                            {{-- <div class="main-logo"> --}}
                            {{-- <a href="/"><img src="{{asset('web-assets/images/logo/bombaylogo.png')}}" alt="">  </a> --}}
                            <h2 class="title-1"> <span class="light-font">BOMBAY CHOC N NUTS</span> <strong> </strong> </h2>
                            {{-- </div> --}}

                            <div class="text-widget">
                                <p>At Bombay Choc N Nuts, we offer a tantalizing array of the finest dry fruits, chocolates, and much more. Indulge in our premium selection and elevate your snacking experience to new heights of delight and satisfaction.</p>

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 footer-widget lpc">
                            <h2 class="title-1"> <span class="light-font">Services</span> <strong> </strong> </h2>

                            <ul class="list">
                                <li> <a href="/about-us"> About Our Shop </a> </li>
                                <li> <a href="/specialoffers"> Top Sellers </a> </li>
                                <li> <a href="/shop"> New Products </a> </li>
                                <li> <a href="/wishlist"> Secure Shopping </a> </li>
                            </ul>
                        </div>
                        <!-- <div class="col-md-2 col-sm-4 footer-widget">
                                 <h2 class="title-1">  <span class="light-font">my  </span> <strong>account </strong> </h2>
                            
                                <ul class="list">
                                    <li> <a href="/my-account"> my account </a> </li>
                                    <li><a href="/account-information"> Account Information </a></li>
                                    <li><a href="/address-book"> Address Books</a></li>
                                    <li><a href="/order-history"> Order History</a></li>
                                    <li><a href="/review-rating"> Reviews and Ratings</a></li>
                                    <li><a href="/return"> Returns Requests</a></li>
                                    <li><a href="/newsletter"> Newsletter</a></li>
                                </ul>
                            </div>  -->
                        <div class="col-md-4 col-sm-4 footer-widget">
                            <a href="/contact">
                                <h2 class="title-1"> <span class="light-font"> Contact Us </span> <strong> </strong>
                                </h2>
                            </a>

                            <ul>
                                <li> <i class="fa fa-whatsapp"></i> <span>Whatsapp Number<br><a
                                    href="https://api.whatsapp.com/send?phone=03300266229" 
                                    target="_blank" data-target="html"
                                    >0330 0266229</a> </span> </li>
                                <li> <i class="fa fa-map-marker"></i> Showroom # 2, 34 F, Muhammad Ali Cooperative Housing Society, Karachi </li>
                                <li> <i class="fa fa-envelope"></i> <span>Email<br><a
                                            href="/#">contact@bombaychoconuts.com</a> </span> </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="footer-bottom">
                <div class="pattern">
                    <img alt="" src="assets/img/icons/white-pattern.png">
                </div>
                <div id="to-top" class="to-top"> <i class="fa fa-arrow-circle-o-up"></i> </div>
                <div class="container ptb-10">
                    <div class="row">
                        <div class="col-md-6 col-sm-5">
                            <p>© {{date('Y')}} <a href="/#"> <strong> bombaychoconnuts.com</strong> </a>,copyright all rights reserved</p>
                        </div>
                       
                        <div class="col-md-6 col-sm-7">
                            <ul class="primary-navbar footer-menu">
                                <li> <a href="/contact">contact us </a> </li>
                                <li> <a href="/shop">order online </a> </li>
                                <li> <a href="/specialoffers">special offer </a> </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
        <!-- /FOOTER -->
        <div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>
    
    <!-- /WRAPPER -->

    <!-- Product Preview Popup -->
    <section class="modal fade" id="product-preview" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg product-modal">
            <div class="modal-content">
                <a aria-hidden="true" data-dismiss="modal" class="sb-close-btn close" href="/#"> <i
                        class=" fa fa-close"></i> </a>
            </div>
        </div>
    </section>
    <!-- / Product Preview Popup -->



    @yield('scripts')
    <!-- JS Global -->
    <script src="{{asset('assets/js/plugin/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets/js/plugin/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugin/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/js/plugin/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/plugin/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('assets/js/plugin/jquery.countdown.js')}}"></script>
    <script src="{{asset('assets/js/plugin/jquery.subscribe-better.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <script>
    // Function to save selected category to local storage
    function saveSelectedCategory() {
        var selectedCategory = document.getElementById("categorySelect").value;
        localStorage.setItem("selectedCategory", selectedCategory);
    }

    // Function to load selected category from local storage
    function loadSelectedCategory() {
        var selectedCategory = localStorage.getItem("selectedCategory");
        if (selectedCategory) {
            document.getElementById("categorySelect").value = selectedCategory;
        }
    }

    // Call the loadSelectedCategory function when the page loads
    window.onload = function () {
        loadSelectedCategory();
    };

    // Attach an event listener to the dropdown to save the selected category when it changes
    document.getElementById("categorySelect").addEventListener("change", function () {
        saveSelectedCategory();
    });

    function zoomIn(event) {
        var element = document.getElementById("overlay");
        element.style.display = "inline-block";

        var img = document.getElementById("imgZoom");
        var rect = img.getBoundingClientRect();

        var posX, posY;

        img.addEventListener("mousemove", function(event) {
            // Calculate mouse position relative to the image
            posX = event.clientX - rect.left;
            posY = event.clientY - rect.top;

            // Ensure posX and posY are within the image boundaries
            posX = Math.min(Math.max(posX, 0), img.width);
            posY = Math.min(Math.max(posY, 0), img.height);

            // Set the background image and position
            element.style.backgroundImage = "url('" + img.src + "')";
            element.style.backgroundPosition = (-posX * 1) + "px " + (-posY * 1) + "px";

            // Zoom effect
            element.style.transform = "scale(1)"; // Adjust the scale factor as needed
        });

        img.addEventListener("mouseout", function() {
            // Reset the zoom effect when the mouse leaves the image
            element.style.transform = "scale(0)";
            element.style.display = "none";
            element.style.border = "unset";
        });
    }

    function zoomOut() {
        var element = document.getElementById("overlay");
        element.style.display = "none";
        element.style.border = "unset";
    }

    document.addEventListener('DOMContentLoaded', function() {
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            const dropdownContent = this.querySelector('.dropdown-content');

            // Hide all other dropdowns
            document.querySelectorAll('.dropdown-content').forEach(content => {
                if (content !== dropdownContent) {
                    content.style.display = 'none';
                    content.parentElement.classList.remove('active');
                }
            });

            // Toggle current dropdown
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
                this.classList.remove('active');
            } else {
                dropdownContent.style.display = 'block';
                this.classList.add('active');
            }
        });
    });
});
    </script>

    <div class="lightbox js-lightbox js-toggle-cart"></div>
</body>

</html>
