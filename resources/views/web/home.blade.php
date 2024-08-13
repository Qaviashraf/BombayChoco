@extends('web.master')
@section('content')
    <!-- Main Slider Start -->
    <section class="main-slide">
        <div id="naturix-slider" class="owl-carousel nav-1">
            <div class="item">
                <img src="{{ asset('web-assets/images/banner/Home1.jpg') }}" alt="">
                <div class="tbl-wrp slide-1">
                    <div class="text-middle">
                        <div class="tbl-cell">
                            <div class="slide-caption container text-center">
                                <div class="slide-title">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('web-assets/images/banner/Home2.jpg') }}" alt="">
                <div class="tbl-wrp slide-1">
                    <div class="text-middle">
                        <div class="tbl-cell">
                            <div class="slide-caption container text-center">
                                <div class="slide-title">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('web-assets/images/banner/Home3.jpg') }}" alt="">
                <div class="tbl-wrp slide-1">
                    <div class="text-middle">
                        <div class="tbl-cell">
                            <div class="slide-caption container text-center">
                                <div class="slide-title">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Main Slider Ends -->
    <section class="category-all">
        <h2 class="section-title ptb-15" style="text-align: center;"> <span class="light-font">Explore </span>
            <strong>Categories </strong>
        </h2>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="tab-content organic-content row">
                    <div id="product-tab-1" class="tab-pane fade active in">
                        <div class="product-slider-1 dots-1">
                            @foreach ($parentCategories as $category)
                                <div class="item">
                                    <div class="product-box category-box">
                                        <div class="product-media category-media">
                                            <img class="prod-img"
                                                src="{{ asset('images/product-categories/' . $category->image) }}"
                                                alt="">
                                            <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                        </div>
                                        <div class="product-caption">
                                            <h3 class="product-title">
                                                <a href="{{ route('getCategoryByProduct', $category->slug) }}"> <span class="light-font"> {{ $category->name }}</a>
                                            </h3>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="item">
                                <div class="product-box category-box category-views1"
                                    style=" background-image: url({{ asset('web-assets/images/product/categorynut.webp') }}) ;">
                                    <div class="product-media category-media category-all">
                                    </div>
                                    <div class="product-caption">
                                        <h3 class="product-title">
                                            <a href="/category"> <span class="light-font"> </span> <strong>View All
                                                    Categories</strong></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Organic All Starts-->
    <section class="organic-all sec-space-bottom">
        <div class="container">
            <div class="organic-wrap">
                <h2 class="section-title ptb-15"> <span class="light-font">Shop by </span> <strong>Categories </strong></h2>
                <div class="tabs-box">
                    <ul class="theme-tabs" id="categories">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="tab-content organic-content row width-fly">
                                    <div class="product-slider-1 dots-1">
                                        @foreach ($parentCategories as $category)
                                            <li class="hish"><a href="#" data-toggle="tab" class="category-btn"
                                                    data-id="{{ $category->id }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>

                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="tab-content shop-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="hidden-xs hidden-sm">
                            <!-- Content specific to screens larger than mobile -->
                            <div class="tab-pane fade active in productShopCards giftbundles" role="tabpanel">
                                <!-- Larger screen-specific content goes here -->
                            </div>
                        </div>
                        
                        <div class="hidden-md hidden-lg">
                            <!-- Content specific to mobile screens -->
                            <div class="tab-pane fade active in productMobileShopCards giftbundles" role="tabpanel">
                                <!-- Mobile-specific content goes here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </section>
    <!-- Organic Farmfood Starts-->
    <section class="organic-farm sec-space-top light-bg "
        style=" background-image: url({{ asset('web-assets/images/product/5-removebg-preview.png') }}) ;">
        <div class="container rel-div">
            <div class="title-wrap">
                <h2 class="section-title"> <span class="light-font">we are </span> <strong>Bombay Choc N Nuts <img
                            src="assets/img/icons/logo-icon.png" alt="" /> </strong> </h2>
                <h4 class="sub-title"> <span> ABOUT OUR DRY FRUITS </span> </h4>
                <p>Bombay Choc N Nuts offers the finest selection of premium dry fruits sourced from around the world. Indulge in our exquisite range of high-quality nuts, dried fruits, and delectable chocolates, crafted to perfection for an unforgettable snacking experience. Discover the ultimate blend of luxury and taste with Bombay Choc N Nuts. </p>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="feature-wrap">
                        <img src="{{ asset('web-assets/images/new/1.png') }}" alt="">
                        <h3 class="title-1 ptb-15"> <span class="light-font">fresh from </span> <strong> Bombay Choc N
                                Nuts</strong> </h3>
                        <p>Elevate your snacking game with our handpicked selection of the finest treats, straight from the heart of Bombay.
                        </p>
                       
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="feature-wrap">
                        <img src="{{ asset('web-assets/images/new/2.png') }}" alt="">
                        <h3 class="title-1 ptb-15"> <span class="light-font"> 100%</span> <strong> organic goods</strong>
                        </h3>
                        <p>Taste the difference with our premium selection of naturally grown delights, crafted with care for your health and satisfaction.
                        </p>
                       
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="feature-wrap">
                        <img src="{{ asset('web-assets/images/new/3.png') }}" alt="">
                        <h3 class="title-1 ptb-15"> <span class="light-font">premium </span> <strong> quality</strong>
                        </h3>
                        <p>Immerse yourself in the epitome of luxury with our premium selection. Each product is meticulously sourced from the finest sources, ensuring unrivaled quality and flavor.
                        </p>
                       
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="feature-wrap">
                        <img src="{{ asset('web-assets/images/new/4.png') }}" alt="">
                        <h3 class="title-1 ptb-15"> <span class="light-font">100% </span> <strong>natural</strong> </h3>
                        <p>Experience the purity of nature with our 100% natural products. Sourced from the finest ingredients, our offerings are free from artificial additives and preservatives, allowing you to savor the true essence of wholesome goodness in every bite. </p>
                       
                    </div>
                </div>
            </div>

            <div class="rel-div feature-img">
                <img class="aligncenter wp-image-402 size-full"
                    src="{{ asset('web-assets/images/product/almonds.png') }}" alt ="">
            </div>
        </div>
    </section>
    <!-- / Organic Farmfood Ends -->

    <!-- Our Products Starts-->
    <section class="organic-product ">
        <div class="row sec-space-top">
            <div class="col-lg-7 col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('images/product-images/1706105382.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">Almond </span> <strong>
                                Fry Salted </strong> </a> </h3>
                            {{-- <a class="clr-txt font-2" href="/#"> <i> 52 items </i> </a> --}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('images/product-images/1706106169.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">Pistachio </span> <strong>
                                Salted With Shell </strong> </a> </h3>
                            {{-- <a class="clr-txt font-2" href="/#"> <i> 35 items </i> </a> --}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('images/product-images/1706106949.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">Pinenuts </span>
                                    <strong> Without Shell </strong> </a> </h3>
                            {{-- <a class="clr-txt font-2" href="/#"> <i> 23 items </i> </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="organic-prod-info">
                    <h4 class="sub-title"> FRESH FROM THE STORE </h4>
                    <h2 class="section-title ptb-15"> <span class="light-font">220+ </span> <strong>Chocolates, Dry Fruits 
                            </strong> <span class="light-font"> & </span> <strong> A Lot More</strong> </h2>
                    <p class="fsz-16">Embark on a culinary adventure with our lavish assortment, featuring a stunning selection of over 220 chocolates, luscious dry fruits, and an abundance of gourmet treasures. From rich, velvety chocolates to succulent dried fruits, each item is meticulously curated to tantalize your taste buds and elevate your snacking experience to new heights of opulence and delight. Explore the myriad flavors and textures that await you, promising a journey of unparalleled indulgence and satisfaction.
                    </p>
                </div>
            </div>
        </div>
        <div class="row sec-space-top">
            <div class="col-lg-5 col-sm-12">
                <div class="organic-prod-info">
                    <h4 class="sub-title"> FRESH FROM THE STORE </h4>
                    <h2 class="section-title ptb-15"> <span class="light-font">Handpicked  </span> <strong>& Premium Quality</strong>
                        </h2>
                    <p class="fsz-16">Delight in the unparalleled quality of our handpicked selection, meticulously curated to offer only the finest ingredients and flavors. Each product is caref…</p>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('images/product-images/1706538478.jpeg') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">Elit Luxury Collection  </span> <strong>
                                Chocolate Paralise Red Box</strong> </a> </h3>
                            {{-- <a class="clr-txt font-2" href="/#"> <i> 26 items </i> </a> --}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('images/product-images/1706538607.jpeg') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">Elit Luxury Collection </span> <strong>
                                Chocolate Paralise Green Box</strong> </a> </h3>
                            {{-- <a class="clr-txt font-2" href="/#"> <i> 31 items </i> </a> --}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('images/product-images/1706538708.jpeg') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">Elit Luxury Collection Chocolate Paralise Salmon Box </span> <strong>
                                Chocolate Paralise Salmon Box</strong> </a> </h3>
                            {{-- <a class="clr-txt font-2" href="/#"> <i> 17 items </i> </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- / Our Products Ends -->

    <!-- Deals Starts-->
    <section class="deals sec-space light-bg">
        <img alt="" src="assets/img/extra/sec-img-3.png" class="right-bg-img" />
        <img alt="" src="assets/img/extra/sec-img-4.png" class="left-bg-img" />

        <div class="container">
            <div class="row">
                <div class="col-sm-5 text-right">
                    <h4 class="sub-title"> Bombay Choc n Nuts 
                   </h4>
                    <h2 class="section-title"> <span class="light-font">   Enjoy Free  </span> <strong>  Delivery </strong> <span
                            class="light-font"></span> </h2>
                </div>
                <div class="col-sm-2 text-center no-padding">

                    <img class="prod-img" src="{{ asset('web-assets/images/product/chocsss.png') }}" alt="">
                </div>
                <div class="col-sm-5">
                    <p>Enjoy the convenience of free delivery when you shop on our website! Experience hassle-free shopping from the comfort of your own home, and have your favorite treats delivered straight to your doorstep at no extra cost. </p>
                </div>
            </div>
            <div class="deal-count">
                <div class="countdown-wrapper">
                    <div id="defaultCountdown" class="countdown"></div>
                </div>
            </div>
            <div class="deal-slider dots-2">
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> Chocolates
                                </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">Fresh from  
                                </span>
                                        <strong>the Globe</strong> </a> </h2>
                                <p>Enjoy premium chocolates at the comfort of your home with free delivery 
                                </p>
                                {{-- <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div> --}}
                            </div>
                            <div class="deal-img"> 
                                <img src="{{ asset('web-assets/images/product/51-removebg-preview.png') }}" alt style="width: 270px;"/>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> Dry Fruits  
                                </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh from </span>
                                        <strong>the Globe </strong> </a> </h2>
                                <p>Enjoy the season’s treat at the comfort of your home with free delivery 
                                </p>
                                {{-- <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div> --}}
                            </div>
                            <div class="deal-img">
                                <img src="{{ asset('web-assets/images/product/almondinn.png') }}" alt
                                style=" width: 270px; margin-top: -13pc;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> Chocolates
                                </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">Fresh from  
                                </span>
                                        <strong>the Globe</strong> </a> </h2>
                                <p>Enjoy premium chocolates at the comfort of your home with free delivery 
                                </p>
                                {{-- <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div> --}}
                            </div>
                            <div class="deal-img"> 
                                <img src="{{ asset('web-assets/images/product/51-removebg-preview.png') }}" alt style="width: 270px;"/>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> Dry Fruits  
                                </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh from </span>
                                        <strong>the Globe </strong> </a> </h2>
                                <p>Enjoy the season’s treat at the comfort of your home with free delivery 
                                </p>
                                {{-- <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div> --}}
                            </div>
                            <div class="deal-img">
                                <img src="{{ asset('web-assets/images/product/almondinn.png') }}" alt
                                style=" width: 350px;" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> ORGANIC FRUITS </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span>
                                        <strong>Chocolates</strong> </a> </h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                            <div class="deal-img"> <img src="{{ asset('web-assets/images/giftbasket/4.png') }}"
                                    alt="" /> </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> ORGANIC FRUITS </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span>
                                        <strong>Buckets</strong> </a> </h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                            <div class="deal-img"> <img src="{{ asset('web-assets/images/giftbasket/5.png') }}"
                                    alt="" /> </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- / Deals Ends -->

    <!-- Subscribe Newsletter Starts-->
    <section class="subscribe-wrap sec-space light-bg">
        <img alt="" src="assets/img/extra/sec-img-5.png" class="right-bg-img" />
        <!-- <img src="{{ asset('web-assets/images/product/chocolate.png') }}"  class="leftphp-bg-img" alt=""> -->
        <h4 class="sub-title"> JOIN OUR NEWSLETTER </h4>
        <h2 class="fsz-35"> <span class="light-font">subscribe </span> <strong> newsletter</strong> </h2>
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <form class="newsletter-form row">
                        <div class="form-group col-sm-8">
                            <input class="form-control" placeholder="enter your email address" required=""
                                type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <button class="theme-btn btn-block" type="submit"> subscribe <i
                                    class="fa fa-long-arrow-right"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Newsletter Ends -->

    <!-- Testimonials Starts-->
    <section class="">
        <div class="container">
            <div class="testimonials">
                <div id="testimonial-slider" class="testimonial-slider nav-1">
                    <div class="item">
                        <div class="testi-wrap">
                            <div class="testi-img">
                                <a href="/#"> <img src="{{ asset('web-assets/images/review/client.png') }}"
                                        alt="" style="
                                        width: 50px;
                                    " />
                            </div>
                            <div class="testi-caption">
                                <p> <i>“Full marks to Bombay Choc n Nuts. Bit expensive but worth it. All brands of chocolates are available with beautiful corporate packing. Highly recommended”</i> </p>
                                <a href="/#"> <i class="fa fa-user clr-txt"></i> <strong> M. Aamir Khanx </strong> </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi-wrap">
                            <div class="testi-img">
                                <a href="/#"> <img src="{{ asset('web-assets/images/review/client.png') }}"
                                        alt="" style="
                                        width: 50px;
                                    " />
                            </div>
                            <div class="testi-caption">
                                <p> <i>“Good quality nuts and wedding baskets made here. A bit on the expensive side.”</i> </p>
                                <a href="/#"> <i class="fa fa-user clr-txt"></i> <strong> Danyal </strong> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Ends -->

    <!-- latest news Starts-->
    {{-- <section class="sec-space">
        <div class="container">
            <div class="title-wrap">
                <h4 class="sub-title"> BOMBAY CHOCO N NUTS BLOG </h4>
                <h2 class="section-title"> <span class="light-font">Bombay </span> <strong>latest news </strong> </h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="latest-news">
                        <div class="news-img">
                            <img src="{{ asset('web-assets/images/blog/1.png') }}" alt="" />
                        </div>
                        <div class="news-caption">
                            <h4 class="sub-title-sm"> 26 JUNE 2016 </h4>
                            <h2 class="title-2"> <a href="/#"> <span class="light-font">5 best foods to make you
                                    </span> <strong>fresh & healthy</strong> </a> </h2>
                            <span class="divider-1"></span>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                            <a href="/#" class="fsz-12"> READ ARTICLE <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="latest-news">
                        <div class="news-img">
                            <img src="{{ asset('web-assets/images/blog/2.png') }}" alt="" />
                        </div>
                        <div class="news-caption">
                            <h4 class="sub-title-sm"> 26 JUNE 2016 </h4>
                            <h2 class="title-2"> <a href="/#"> <span class="light-font">5 best foods to make you
                                    </span> <strong>fresh & healthy</strong> </a> </h2>
                            <span class="divider-1"></span>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                            <a href="/#" class="fsz-12"> READ ARTICLE <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- latest news Ends -->
@endsection

@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to fetch and display products
        function fetchAndDisplayProducts(id) {
            $.ajax({
                url: '/products/filter/' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    displayProductCards(data.products);
                    displayMobileProductCards(data.products);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Display products for the default category on page load
        $(document).ready(function() {
            // Replace 'defaultCategory' with your actual default category
            const defaultCategory = '1';

            fetchAndDisplayProducts(defaultCategory);

            // Set up click event for category buttons
            $('.category-btn').on('click', function() {
                const selectedCategory = $(this).data('id');
                fetchAndDisplayProducts(selectedCategory);
            });



            // Set up click event for "View Details" buttons
            $('.productShopCards').on('click', '.view-details-btn', function() {
                const productId = $(this).data('product-id');
                fetchProductDetails(productId);
            });
            // Set up click event for "View Details" buttons
            $('.productMobileShopCards').on('click', '.view-details-btn', function() {
                const productId = $(this).data('product-id');
                fetchProductDetails(productId);
            });
        });
        var productDetailsRoute = "{{ route('productDetails', ['category' => ':category','product' => ':product']) }}";
        function displayProductCards(products) {
            let productsContainer = $(".productShopCards");
            productsContainer.empty(); // Clear previous products
            // Loop through the products and generate HTML for each product card
            $.each(products.slice(0, 12), function(index, product) {
                var productId = product.id;
                var categoryName = product.product_category.slug;
                var slug = product.slug;
                // Create a new 'a' (anchor) element
                var linkElement = document.createElement("a");

                // Set the 'href' attribute using the template string
                linkElement.href = productDetailsRoute.replace(':category', encodeURIComponent(categoryName))
                .replace(':product', encodeURIComponent(slug));
                let productCard = `<div class="col-lg-2 col-md-4 col-sm-6"> 
                        <div class="product-box"> 
                            <div class="product-media" style="background-color: ${product.product_category.color_code} !important; background-image: url({{ asset('web-assets/images/banner/text.png') }})"> 
                                <a href="${linkElement}">
                                    <img class="prod-img drift-demo-trigger " data-zoom="{{ asset('images/product-images/${product.photo}') }}" src="{{ asset('images/product-images/${product.photo}') }}" alt=""/>     
                                </a>  
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    @if(Auth::user())
                                        <form action="{{ route('wishlist.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="${product.id}" />
                                            <button type="submit" class="fa fa-heart"></button>
                                        </form>
                                    @else
                                        <a href="/wishlist" class="fa fa-heart"></a>
                                    @endif
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-shopping-basket view-details-btn" data-product-id="${product.id}"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="${linkElement}"> ${product.title}</a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">Rs ${product.product_variants[0].sale_price}</strong>
                                </div>
                            </div>
                        </div>
                    </div>`;
                // Append the product card HTML to the products container
                productsContainer.append(productCard);

                // Break out of the loop after processing 5 products
                if (index === 13) {
                    return false;
                }
            });
            // Implement the logic to display the filtered products in the 'products' section
            // For example, you can loop through the products and update the HTML
        }

        function displayMobileProductCards(products) {
            let productsContainer = $(".productMobileShopCards");
            productsContainer.empty(); // Clear previous products
            // Loop through the products and generate HTML for each product card
            $.each(products.slice(0, 4), function(index, product) {
                var productId = product.id;
                var categoryName = product.product_category.slug;
                var slug = product.slug;
                // Create a new 'a' (anchor) element
                var linkElement = document.createElement("a");

                // Set the 'href' attribute using the template string
                linkElement.href = productDetailsRoute.replace(':category', encodeURIComponent(categoryName))
                .replace(':product', encodeURIComponent(slug));
                let productCard = `<div class="col-lg-3 col-md-4 col-sm-6"> 
                        <div class="product-box"> 
                            <div class="product-media" style="background-color: ${product.product_category.color_code} !important; background-image: url({{ asset('web-assets/images/banner/text.png') }})"> 
                                <a href="${linkElement}">
                                    <img class="prod-img drift-demo-trigger " data-zoom="{{ asset('images/product-images/${product.photo}') }}" src="{{ asset('images/product-images/${product.photo}') }}" alt=""/>     
                                </a>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    @if(Auth::user())
                                        <form action="{{ route('wishlist.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="${product.id}" />
                                            <button type="submit" class="fa fa-heart"></button>
                                        </form>
                                    @else
                                        <a href="/wishlist" class="fa fa-heart"></a>
                                    @endif
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-shopping-basket view-details-btn" data-product-id="${product.id}"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="${linkElement}"> ${product.title}</a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">Rs ${product.product_variants[0].sale_price}</strong>
                                </div>
                            </div>
                        </div>
                    </div>`;
                // Append the product card HTML to the products container
                productsContainer.append(productCard);

                // Break out of the loop after processing 5 products
                if (index === 3) {
                    return false;
                }
            });
            // Implement the logic to display the filtered products in the 'products' section
            // For example, you can loop through the products and update the HTML
        }

        function fetchProductDetails(productId) {
            // Assuming you have an API endpoint to fetch product details
            $.ajax({
                url: '/api/getProductById/' + productId,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    displayProductDetails(data);
                },
                error: function(error) {
                    console.error('Error fetching product details:', error);
                }
            });
        }

        function displayProductDetails(product) {
            const modalBody = $('#product-preview');
            // Clear existing product details
            modalBody.empty();
            // Display product details in the modal
            modalBody.append(`<div class="modal-dialog modal-lg product-modal">
                    <div class="modal-content">
                        <a aria-hidden="true" data-dismiss="modal" class="sb-close-btn close" href="/#"> <i class=" fa fa-close"></i> </a>                 

                        <div class="product-single pb-50 clearfix">
                            <!-- Single Products Slider Starts --> 
                            <div class="row">
                            <div class="col-lg-6 col-sm-6 col-sm-offset-2 col-lg-offset-0 pt-50">
                                <div class="prod-slider sync1">
                                
                          <div id='slideshow-items-container'>
                                    <div class="item slideshow-items img-zoom-container"> 
                                    <img id="imgZoom" onmousemove="zoomIn(event)" onmouseout="zoomOut()"  src="{{ asset('images/product-images/${product.photo}') }}" data-image="${product.photo}" width="300" alt=""/>
                                    <div id="overlay" onmousemove="zoomIn(event)"></div>
                                    <div id="myresult" class="img-zoom-result"></div>
                                        <a href="/assets/img/products/prod-big-1.png" data-gal="prettyPhoto[prettyPhoto]" title="Product" class="caption-link"><i class="arrow_expand"></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- Single Products Slider Ends --> 

                            <div class="col-lg-6 pt-50">
                                <div class="product-content block-inline">

                                    <div class="tag-rate">
                                        <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    </div>

                                    <div class="single-caption"> 
                                        <h3 class="section-title">
                                            <a href="/#"><strong>${product.title}</strong></a>
                                        </h3>
                                        <span class="divider-2"></span>
                                        <p class="price"> 
                                            <strong class="clr-txt fsz-20 saleprice"></strong>
                                        </p>

                                        

                                        <div class="prod-btns">
                                            <div class="quantity">
                                                <input title="Qty" id="quatity" value="1" name="quantity" min="1" class="form-control" type="number">
                                            </div>
                                        </div>
                                        <ul class="meta">
                                            <li class="tags-widget" id="variantsContainer"> 
                                                <strong>Variants:</strong>
                                                ${product.product_variants.map(variant => `
                                                                <span class="weight-option" data-variant="${variant.id}" data-price="${variant.sale_price}"><a href="/#">${variant.weight} </a></span>
                                                            `).join('')}
                                            </li>
                                            <li> <strong>CATEGORY:</strong><span> ${product.product_category.name}</span> </li>
                                        </ul>
                                        <div class="divider-full-1"></div>
                                        <div class="add-cart pt-15">
                                            <a href="/#" class="theme-btn js-add-product  add-to-cart-btn" data-product-id="${product.id}"> <strong> ADD TO CART </strong> </a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>  
                    </div>
                    </div>
                </div>`);

            // Set the default price to be the price of the first variant
            const defaultPrice = product.product_variants[0].sale_price;
            updatePrice(defaultPrice);

            // Function to update the displayed price
            function updatePrice(newPrice) {
                $('.saleprice').text('Rs' + newPrice);
            }
            var variantId = product.product_variants[0].id;
            // Add event listener to the weight options
            $('.weight-option').on('click', function() {
                const selectedWeight = $(this).data('price');
                variantId = $(this).data('variant');
                updatePrice(selectedWeight);
            });

            // Set up click event for "Add to Cart" buttons
            $('#product-preview').on('click', '.add-to-cart-btn', function() {
                var productId = $(this).data('product-id');
                var quantity = document.getElementById('quatity').value;
                var variant_id = variantId;
                array = [{
                    'product_id': parseInt(productId),
                    'quantity': parseInt(quantity),
                    'variant_id': parseInt(variant_id),
                }];
                addToCart(array);
            });
            // $('.modal-open').on('click', '.add-to-cart-btn', function() {
            //     // console.log(123)
            //     var productId = $(this).data('product-id');
            //     var quantity = document.getElementById('quatity').value;
            //     var variant_id = variantId;
            //     array = [{
            //         'product_id': parseInt(productId),
            //         'quantity': parseInt(quantity),
            //         'variant_id': parseInt(variant_id),
            //     }];
            //     addToCart(array);
            // });
        }

        function addToCart(data) {
            // Get the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Make an AJAX request to add the product to the cart
            $.ajax({
                url: '{{ route('cart.store') }}',
                method: 'POST',
                data: {
                    product_id: data[0].product_id,
                    quantity: data[0].quantity,
                    variant_id: data[0].variant_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    $('#product-preview').hide();
                    location.reload();
                    // openCart();
                },
                error: function(error) {
                    console.error('Error adding to cart:', error);
                }
            });

        }
        
        // $(document).ready(function() {
        //     openCart(); // Call openCart when the document is ready
        // });
    });
</script>
