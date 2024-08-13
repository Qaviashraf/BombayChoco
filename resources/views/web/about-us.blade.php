@extends('web.master')
@section('content')

            <!--Breadcrumb Section Start-->
            <section class="about breadcrumb-bg" style="min-height: 100%;background: linear-gradient(0deg, #333333ad, #000000b0), url(http://127.0.0.1:8000/web-assets/images/banner/aboutbanner.jpg);background-size: cover;">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb white-clr">                        
                      <h4>About</h4>
                      <h2>Bombay Choc N Nuts</h2> 
                      <ol class="breadcrumb breadcrumb-menubar">
                        <li> <a href="/#"> Home </a> About Us </li>                             
                    </ol>
                    </div>  
                </div>
            </section>
            <!--Breadcrumb Section End-->
            <section class="shop-wrap sec-space-bottom">
                <div class="pattern"> 
                    <img alt="" src="assets/img/icons/white-pattern.png">
                </div>
            <!--Breadcrumb Section End-->

            <!-- Organic Farmfood Starts-->
            <section class="organic-farm-2 sec-space-bottom">

              
              
               
                <div class="section-icon"> 
                    {{-- <img alt="" src="assets/img/extra/sec-img-1.png" class="left-top-img">  
                    <img alt="" src="assets/img/extra/sec-img-3.png" class="center-bg-img">   --}}
                    <img alt="" src="assets/img/extra/sec-img-4.png" class="left-bottom-img">
                    <img src="{{asset('web-assets/images/product/Chocoandnuts.jpg')}}" alt style="
        margin-top:-50px;  mix-blend-mode: multiply;
  filter: contrast(1);"/>
                    <div class="ptb-15 icon"> 
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>  <i class="fa fa-star"></i> 
                        <span class="light-font about-con"> A Taste Of </span> <strong class="darkness about-dar">Real Goodness</strong>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>  <i class="fa fa-star"></i>
                        <p>Whether you're looking for a yummy snack, need a thoughtful gift, or just want to treat yourself, come and check out Bombay Choc N Nuts. We're here to make your day a bit sweeter and more enjoyable!
                        </p> 
                    </div>
                </div>

                <div class="container rel-div">
                   <div class="row">
                            <p class="about-pp">Step into the sweet world of Bombay Choc N Nuts, a wonderful place for everyone in Pakistan who loves sweets and snacks! Our store is filled with great choices, from tasty chocolates and crunchy biscuits to healthy dry fruits and lots of different candies.</h3>
                       <h5 class="abouth5">ABOUT BOMBAY CHOC N NUTS</h5>
                        {{-- <div class="col-sm-6 text-left xs-text">
                            <h2 class="section-title"> <span class="light-font">we are </span> <strong>organic farmfood <img src="assets/img/icons/logo-icon.png" alt="" /> </strong> </h2>
                            <h4 class="sub-title"> ABOUT Bombay Choco N nuts Products</h4>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 text-center">
                            <div class="feature-wrap">
                                <img src="{{asset('web-assets/images/product/Fresh.png')}}" alt=""/>
                                <h3 class="title-1 ptb-15 " style="color: black"> <span >100%  </span>  Fresh </h3>
                             
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 text-center">
                            <div class="feature-wrap">
                                <img src="{{asset('web-assets/images/product/Premium.png')}}" alt=""/>
                                <h3 class="title-1 ptb-15" style="color: black"> <span >premium </span>  Quality </h3>
                               
                               
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 text-center">
                            <div class="feature-wrap">
                                <img src="{{asset('web-assets/images/product/Organic.png')}}" alt=""/>
                                <h3 class="title-1 ptb-15" style="color: black"> <span > 100%</span> Hygienic</h3>
                                
                            </div>
                        </div>
                        {{-- <div class="col-md-3 col-sm-6 text-center">
                            <div class="feature-wrap">
                                <img src="{{asset('web-assets/images/giftbasket/4.png')}}" alt=""/>
                                <h3 class="title-1 ptb-15" style="color: black"> <span >100% </span> natural </h3>
                                <p style="color: #ea5251">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.  </p>
                                <a href="/#" class="sm-bnt-wht">Read More</a>
                            </div>
                        </div> --}}
                    </div>

                   
                </div>
            </section>

            <!-- / Organic Farmfood Ends -->      
<section class="image">
    <div class="rel-div feature-img">
        <img src="{{asset('web-assets/images/product/Dry.jpg')}}" alt=""/>
    </div>
</section>
            <!-- About Us Starts-->
            <section class="short-about sec-space light-bg" style="background-color: #ebc54d !important;">

               >

                <div class="container rel-div">
                    <div class="title-wrap pt-15">                       
                        <h4 class="fsz-20"> <strong>Bombay</strong> <span class="light-font">  since 1976</span> </h4>
                        <h2 class="fsz-50 over-txt-title"> 
                            <span class="light-font"> WE DO <span class="over-txt light-bg">100% ORGANIC GUARANTEE</span> </span> 
                            <strong>HEALTHY</strong> 
                        </h2>
                        <p>We started Bombay Choc N Nuts with a simple idea: to bring together a variety of the best snacks and sweets in one easy-to-find place. Whether you're a fan of chocolate or you like nuts and dry fruits, we have a lot of different options for you.
                        </p>
                    </div>

                    <div class="about-wrap"> 
                     
                        {{-- <h4 class="owner-name">  <span class="light-font"> IBRAHIM</span> </h4> 
                        <h5 class="clr-txt sub-title-sm">BCN OWNER</h5>  --}}
                        <div class="icon"> 
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>   
                            <span class="light-font"> A Taste Of </span> <strong class="real">Real Goodness</strong> 
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>  
                        </div>
                    </div>
                </div>

            </section>
            <!-- / About Us Ends -->       

         <!-- Our Products Starts-->
         <section class="organic-product sec-space">
            <div class="row sec-space-top">
                <div class="col-lg-7 col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="organic-prod">
                                <img src="{{ asset('images/product-images/1706105382.png') }}" alt="" />
                                <span class="divider"></span>
                                <h3 class="title-1"> <a href="#"> <span class="light-font">Almond </span> <strong>
                                    Fry Salted </strong> </a> </h3>
                                {{-- <a class="clr-txt font-2" href="/#"> <i> 52 items </i> </a> --}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="organic-prod">
                                <img src="{{ asset('images/product-images/1706106169.png') }}" alt="" />
                                <span class="divider"></span>
                                <h3 class="title-1"> <a href="#"> <span class="light-font">Pistachio </span> <strong>
                                    Salted With Shell </strong> </a> </h3>
                                {{-- <a class="clr-txt font-2" href="/#"> <i> 35 items </i> </a> --}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="organic-prod">
                                <img src="{{ asset('images/product-images/1706106949.png') }}" alt="" />
                                <span class="divider"></span>
                                <h3 class="title-1"> <a href="#"> <span class="light-font">Pinenuts </span>
                                        <strong> Without Shell </strong> </a> </h3>
                                {{-- <a class="clr-txt font-2" href="/#"> <i> 23 items </i> </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="organic-prod-info">
                        <h4 class="sub-title"> FRESH FROM THE STORE </h4>
                        <h2 class="section-title ptb-15"> <span class="light-font">220+ </span> <strong>chocolates, dry
                                fruites </strong> <span class="light-font"> & </span> <strong> lot more</strong> </h2>
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
                                <h3 class="title-1"> <a href="#"> <span class="light-font">Elit Luxury Collection  </span> <strong>
                                    Chocolate Paralise Red Box</strong> </a> </h3>
                                {{-- <a class="clr-txt font-2" href="/#"> <i> 26 items </i> </a> --}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="organic-prod">
                                <img src="{{ asset('images/product-images/1706538607.jpeg') }}" alt="" />
                                <span class="divider"></span>
                                <h3 class="title-1"> <a href="#"> <span class="light-font">Elit Luxury Collection </span> <strong>
                                    Chocolate Paralise Green Box</strong> </a> </h3>
                                {{-- <a class="clr-txt font-2" href="/#"> <i> 31 items </i> </a> --}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="organic-prod">
                                <img src="{{ asset('images/product-images/1706538708.jpeg') }}" alt="" />
                                <span class="divider"></span>
                                <h3 class="title-1"> <a href="#"> <span class="light-font">Elit Luxury Collection Chocolate Paralise Salmon Box </span> <strong>
                                    Chocolate Paralise Salmon Box</strong> </a> </h3>
                                {{-- <a class="clr-txt font-2" href="/#"> <i> 17 items </i> </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </section>
<!-- / Our Products Ends -->       

            <!-- / CONTENT AREA -->

            <!-- FOOTER -->
            {{-- <footer class="page-footer"> 
                <section class="sec-space light-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 footer-widget">
                                <div class="main-logo">
                                    <a href="/"> <img alt="" src="assets/img/logo/main-logo.png" />  </a>
                                    <span class="medium-font">ORGANIC STORE</span>
                                </div>
                                <span class="divider-2"></span>
                                <div class="text-widget">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
                                    <ul>
                                        <li> <i class="fa fa-map-marker"></i> <span> <strong>100 highland ave,</strong> california, united state </span> </li>
                                        <li> <i class="fa fa-envelope-square"></i> <span><a href="/#">contact@naturix.com</a> </span> </li>
                                        <li> <i class="fa fa-phone-square"></i> <span><a href="/#">www.naturix.com</a> </span> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 footer-widget">
                                <h2 class="title-1">  <span class="light-font">naturix  </span> <strong>information </strong> </h2>
                                <span class="divider-2"></span>
                                <ul class="list">
                                    <li> <a href="/#"> about our shop </a> </li>
                                    <li> <a href="/#"> top sellers </a> </li>
                                    <li> <a href="/#"> our blog </a> </li>
                                    <li> <a href="/#"> new products </a> </li>
                                    <li> <a href="/#"> secure shopping </a> </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-4 footer-widget">
                                <h2 class="title-1">  <span class="light-font">my  </span> <strong>account </strong> </h2>
                                <span class="divider-2"></span>
                                <ul class="list">
                                    <li> <a href="/my-account"> my account </a> </li>
                                    <li><a href="/account-information"> Account Information </a></li>
                                    <li><a href="/address-book"> Address Books</a></li>
                                    <li><a href="/order-history"> Order History</a></li>
                                    <li><a href="/review-rating"> Reviews and Ratings</a></li>
                                    <li><a href="/return"> Returns Requests</a></li>
                                    <li><a href="/newsletter"> Newsletter</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-4 footer-widget">
                                <h2 class="title-1">  <span class="light-font">photo  </span> <strong>instagram </strong> </h2>
                                <span class="divider-2"></span>
                                <ul class="instagram-widget">
                                    <li> <a href="/#"> <img src="assets/img/extra/80x80-1.jpg" alt="" /> </a> </li>
                                    <li> <a href="/#"> <img src="assets/img/extra/80x80-2.jpg" alt="" /> </a> </li>
                                    <li> <a href="/#"> <img src="assets/img/extra/80x80-3.jpg" alt="" /> </a> </li>
                                    <li> <a href="/#"> <img src="assets/img/extra/80x80-4.jpg" alt="" /> </a> </li>
                                    <li> <a href="/#"> <img src="assets/img/extra/80x80-5.jpg" alt="" /> </a> </li>
                                    <li> <a href="/#"> <img src="assets/img/extra/80x80-6.jpg" alt="" /> </a> </li>
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
                    <div class="container ptb-50">
                        <div class="row">
                            <div class="col-md-6 col-sm-5">
                                <p>©2016 <a href="/#"> <strong> naturix.com</strong> </a>, made with <i class="fa fa-heart red-clr"></i> by jThemes Studio, all right reserved</p>
                            </div>
                            <div class="col-md-6 col-sm-7">
                                <ul class="primary-navbar footer-menu">
                                    <li> <a href="/#">contact us </a> </li>
                                    <li> <a href="/#">term of use  </a> </li>
                                    <li> <a href="/#">site map  </a> </li>
                                    <li> <a href="/#">privacy policy</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </footer> --}}
            <!-- /FOOTER -->
{{-- 
<div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>

        </main> --}}
        <!-- /WRAPPER -->


        <!-- Subscribe Popup-Dark -->
        <!--        <section id="subscribe-popups" class="subscribe-me popups-wrap">                
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
                </section>-->
        <!-- / Subscribe Popup-Dark -->

        {{-- <!-- JS Global -->
        <script src="assets/js/plugin/jquery-2.2.4.min.js"></script>   
        <script src="assets/js/plugin/bootstrap.min.js"></script>
        <script src="assets/js/plugin/bootstrap-select.min.js"></script>
        <script src="assets/js/plugin/owl.carousel.min.js"></script>

        <!-- Custom JS -->   
        <script src="assets/js/theme.js"></script> --}}


        @endsection
@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection