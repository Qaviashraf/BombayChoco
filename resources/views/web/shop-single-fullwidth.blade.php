@extends('web.master')
@section('content')

            <!--Breadcrumb Section Start-->
            {{-- <section class="breadcrumb-bg">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">naturix </strong> <span class="light-font">Shop </span> </h2>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="/#"> Home </a> SHOP  </li>                             
                        </ol>
                    </div>  
                </div>
            </section> --}}
            <!--Breadcrumb Section End-->


            <!-- Shop Starts-->
            <section class="shop-wrap sec-space-bottom">
                <div class="container rel-div pt-50">
                    <div class="row">  
                        <div class="col-md-12 pt-15">
                            <div class="product-single sec-space-bottom  clearfix">
                                <!-- Single Products Slider Starts --> 
                                <div class="col-lg-6 pb-50 col-sm-8 col-sm-offset-2 col-lg-offset-0">
                                    <div class="prod-slider sync1">
                                        <div class="item img-zoom-container"> 
                                            <img id="myimage" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/> 
                                            <div id="myresult" class="img-zoom-result"></div>                                         
                                        </div>
                                        <div class="item img-zoom-container"> 
                                            <img id="myimage" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/> 
                                            <div id="myresult" class="img-zoom-result"></div>                                         
                                        </div>
                                        <div class="item img-zoom-container"> 
                                            <img id="myimage" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/> 
                                            <div id="myresult" class="img-zoom-result"></div>                                         
                                        </div>
                                        <div class="item img-zoom-container"> 
                                            <img id="myimage" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/> 
                                            <div id="myresult" class="img-zoom-result"></div>                                         
                                        </div>
                                    </div>

                                    <div  class="sync2">
                                        <div class="item "> <a href="/#">   <img id="myimage" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/> </a> </div>
                                        <div class="item"> <a href="/#">   <img  id="myimage" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/> </a> </div>
                                        <div class="item"> <a href="/#">   <img id="myimage" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/> </a> </div>
                                        <div class="item"> <a href="/#">   <img id="myimage" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/> </a> </div>
                                    </div>
                                </div>
                                <!-- Single Products Slider Ends --> 

                                <div class="col-lg-6">
                                    <div class="product-content block-inline">

                                        <div class="tag-rate">
                                            <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span> 
                                                <span class="fsz-12 gray-color ml-10"> Based on 25 reviews</span>
                                            </div>
                                        </div>

                                        <div class="single-caption"> 
                                            <h3 class="section-title">
                                                <a href="/#"> <span class="light-font"> organic </span>  <strong>pinapple</strong></a>
                                            </h3>
                                            <span class="divider-2"></span>
                                            <p class="price"> 
                                                <strong class="clr-txt fsz-20">$50.00 </strong> <del class="light-font">$65.00 </del>
                                            </p>

                                            <div class="fsz-16">
                                                <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                                            </div>

                                            <div class="prod-btns">
                                                <div class="quantity">
                                                    <button class="btn minus"><i class="fa fa-minus-circle"></i></button>
                                                    <input title="Qty" placeholder="03" class="form-control qty" type="text">
                                                    <button class="btn plus"><i class="fa fa-plus-circle"></i></button>
                                                </div>
                                                <div class="sort-dropdown">
                                                    <div class="search-selectpicker selectpicker-wrapper">
                                                        <select class="selectpicker input-price"  data-width="100%"
                                                                data-toggle="tooltip">
                                                            <option>Kilo</option>
                                                            <option>2 Kilo</option>
                                                            <option>3 Kilo</option>
                                                            <option>4 Kilo</option>
                                                            <option>5 Kilo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group"> <i class="fa  fa-check-square-o clr-txt"></i> <span>Ready in stock</span> </div>
                                            </div>
                                            <ul class="meta">
                                                <li> <strong> SKU </strong> <span>: &nbsp;  AB2922-B</span> </li>
                                                <li> <strong> CATEGORY </strong> <span>:  &nbsp; Fruits</span> </li>
                                                <li class="tags-widget"> <strong> TAGS </strong> <span>: &nbsp; <a href="/#">fruits</a> <a href="/#">vegetables</a> <a href="/#">juices</a></span> </li>
                                            </ul>
                                            <div class="divider-full-1"></div>
                                            <div class="add-cart pt-15">
                                                <a href="/#" class="theme-btn btn"> <strong> ADD TO CART </strong> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>  

                            <div class="prod-tabs pb-50">
                                <ul class="tabs fsz-20">
                                    <li class=""><a href="/#prod-tab-1" data-toggle="tab"> <span class="light-font">item </span> <strong>description </strong> </a></li>
                                    <li class=""><a href="/#prod-tab-2" data-toggle="tab"> <span class="light-font">additional </span> <strong>info </strong> </a></li>
                                    <li class="active"><a href="/#prod-tab-3" data-toggle="tab"> <span class="light-font">item </span> <strong>reviews (3)</strong> </a></li>
                                </ul>
                                <div class="divider-full-1"></div>

                                <div class="tab-content prod-tab-content">
                                    <div id="prod-tab-1" class="tab-pane fade">
                                        <h3 class="fsz-16"><span class="light-font">item </span> <strong>description </strong>  </h3>
                                        <span class="divider-2 crl-bg"></span>

                                        <div class="block-inline pera">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore. </p>
                                        </div>

                                    </div>
                                    <div id="prod-tab-2" class="tab-pane fade">
                                        <h3 class="fsz-16"><span class="light-font">additional </span> <strong>info </strong> </h3>
                                        <span class="divider-2 crl-bg"></span>

                                        <div class="block-inline pera">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore. </p>
                                        </div>
                                    </div>
                                    <div id="prod-tab-3" class="tab-pane fade in active">
                                        <h3 class="fsz-16"><span class="light-font">customers </span> <strong>reviews </strong> <span class="clr-txt">(3)</span> </h3>
                                        <span class="divider-2 crl-bg"></span>

                                        <div class="review-wrap">
                                            <div class="review-img">
                                                <a href="/#"> <img alt="" src="assets/img/extra/review-1.png" /> </a>
                                            </div>
                                            <div class="review-caption">
                                                <h4 class="title fsz-16">
                                                    <a href="/#">Luis Nazario Garcia</a>
                                                    <span class="fsz-10 gray-color">26 JUNE 2016</span>
                                                </h4>
                                                <div class="rating">
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="fsz-12 gray-color"> Rating : 5/5 </span>
                                                </div>

                                                <div class="block-inline pera">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore. </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="review-wrap">
                                            <div class="review-img">
                                                <a href="/#"> <img alt="" src="assets/img/extra/review-1.png" /> </a>
                                            </div>
                                            <div class="review-caption">
                                                <h4 class="title fsz-16">
                                                    <a href="/#">Luis Nazario Garcia</a>
                                                    <span class="fsz-10 gray-color">26 JUNE 2016</span>
                                                </h4>
                                                <div class="rating">
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="fsz-12 gray-color"> Rating : 5/5 </span>
                                                </div>

                                                <div class="block-inline pera">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore. </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="review-wrap">
                                            <div class="review-img">
                                                <a href="/#"> <img alt="" src="assets/img/extra/review-1.png" /> </a>
                                            </div>
                                            <div class="review-caption">
                                                <h4 class="title fsz-16">
                                                    <a href="/#">Luis Nazario Garcia</a>
                                                    <span class="fsz-10 gray-color">26 JUNE 2016</span>
                                                </h4>
                                                <div class="rating">
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="star active"></span>
                                                    <span class="fsz-12 gray-color"> Rating : 5/5 </span>
                                                </div>

                                                <div class="block-inline pera">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat adiping elit food sed diam nonummy nibh euismod tincidunt ut laoreet dolore. </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="you-like organic-content pb-50">
                                <h3 class="fsz-20 pb-15 text-center"><span class="light-font">Related  </span> <strong>Products </strong>  </h3>
                                <div class="divider-full-1"></div>
                                <div id="rel-prod-slider" class="rel-prod-slider nav-1">                                        
                                    <div class="item"> 
                                        <div class="product-box"> 
                                            <div class="product-media"> 
                                                <img class="prod-img" alt="" src="assets/img/products/1.png" />     
                                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                                <div class="prod-icons"> 
                                                    <a href="/#" class="fa fa-heart"></a>
                                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                                </div>
                                            </div>                                           
                                            <div class="product-caption"> 
                                                <h3 class="product-title">
                                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>tomato</strong></a>
                                                </h3>
                                                <div class="price"> 
                                                    <strong class="clr-txt">$50.00 </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item"> 
                                        <div class="product-box"> 
                                            <div class="product-media"> 
                                                <img class="prod-img" alt="" src="assets/img/products/2.png" />     
                                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                                <div class="prod-icons"> 
                                                    <a href="/#" class="fa fa-heart"></a>
                                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                                </div>
                                            </div>

                                            <div class="product-caption"> 
                                                <h3 class="product-title">
                                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>cabbege</strong></a>
                                                </h3>
                                                <div class="price"> 
                                                    <strong class="clr-txt">$50.00 </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item"> 
                                        <div class="product-box active"> 
                                            <div class="product-media"> 
                                                <img class="prod-img" alt="" src="assets/img/products/3.png" />     
                                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                                <div class="prod-icons"> 
                                                    <a href="/#" class="fa fa-heart"></a>
                                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                                </div>
                                            </div>

                                            <div class="product-caption"> 
                                                <h3 class="product-title">
                                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>cherry</strong></a>
                                                </h3>
                                                <div class="price"> 
                                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item"> 
                                        <div class="product-box"> 
                                            <div class="product-media"> 
                                                <img class="prod-img" alt="" src="assets/img/products/4.png" />     
                                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                                <div class="prod-icons"> 
                                                    <a href="/#" class="fa fa-heart"></a>
                                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                                </div>
                                            </div>

                                            <div class="product-caption"> 
                                                <h3 class="product-title">
                                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>salad</strong></a>
                                                </h3>
                                                <div class="price"> 
                                                    <strong class="clr-txt">$50.00 </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item"> 
                                        <div class="product-box"> 
                                            <div class="product-media"> 
                                                <img class="prod-img" alt="" src="assets/img/products/5.png" />     
                                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                                <div class="prod-icons"> 
                                                    <a href="/#" class="fa fa-heart"></a>
                                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                                </div>
                                            </div>

                                            <div class="product-caption"> 
                                                <h3 class="product-title">
                                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>pineapple</strong></a>
                                                </h3>
                                                <div class="price"> 
                                                    <strong class="clr-txt">$50.00 </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="your-review">
                                <h3 class="fsz-20 pb-15 text-center"><span class="light-font">Your item </span> <strong>review </strong>  </h3>
                                <div class="divider-full-1"></div>
                                <div class="your-review">
                                    <div class="block-inline your-rating">
                                        <div class="left">
                                            <div class="rating">
                                                <span class="fsz-12 gray-color"> Your Rating :  </span>
                                                <span class="star"></span>
                                                <span class="star"></span>
                                                <span class="star"></span>
                                                <span class="star"></span>
                                                <span class="star"></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="fsz-12 gray-color"> Overall Rating : 5/5  </span>
                                            </div>
                                        </div>
                                    </div>

                                    <form class="review-form row">
                                        <div class="form-group col-sm-4">
                                            <input class="form-control" placeholder="Name" required="" type="text">                                                                                     
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <input class="form-control" placeholder="Email" required="" type="email">                                                                                     
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <input class="form-control" placeholder="Website" type="text">                                                                                     
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <textarea class="form-control"  placeholder="Message" cols="12" rows="4"></textarea>                                                                                     
                                        </div>
                                        <div class="form-group col-sm-12 text-center ptb-15">                                               
                                            <button class="theme-btn" type="submit"> <strong> SUBMIT REVIEW </strong> </button>                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / Shop Ends -->      

            @endsection
