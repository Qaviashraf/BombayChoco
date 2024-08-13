@extends('web.master')
@section('content')

            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/account.jpg')}})">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb">                        
                        <h2 class="section-title"> <span class="light-font"> </span> <strong class="clr-txt">account </strong> </h2>
                        
                    </div>  
                </div>
            </section>
            <!--Breadcrumb Section End-->

            <!-- My Account Starts-->
            <section class="account-page ptb-50">
                <div class="container"> 
                    <div class="row">  
                        <aside class="col-md-9 col-sm-8 ptb-15">
                            <div class="panel-group chk-panel" id="accordion">
                                <div class="panel"> 
                                    <div class="accordion-heading">                              
                                        <a class="title-2" data-toggle="collapse" data-parent="#accordion" href="/#accordion-1" aria-expanded="true"> <span class="light-font">01. My </span> <strong> Account </strong> </a>                              
                                    </div>
                                    <div id="accordion-1" class="panel-collapse collapse in">
                                        <div class="account-body">
                                            <ul class="acnt-list">
                                                <li>  
                                                    <i class="fa fa-arrow-circle-o-right clr-txt"></i> 
                                                    <a href="/account-information"> Edit your account information</a>
                                                </li>
                                                <li> 
                                                     <i class="fa fa-arrow-circle-o-right clr-txt"></i>  
                                                    <a href="/cng-pw"> Change your password</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel"> 
                                    <div class="accordion-heading">                              
                                        <a class="title-2" data-toggle="collapse" data-parent="#accordion" href="/#accordion-2"> <span class="light-font">02. Order and </span> <strong>  Review </strong>  </a>                              
                                    </div>
                                    <div id="accordion-2" class="panel-collapse collapse">
                                        <div class="account-body">
                                            <ul class="acnt-list">
                                                <li>
                                                     <i class="fa fa-arrow-circle-o-right clr-txt"></i> 
                                                    <a href="/order-history"> View your order history</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>                        
                        
                        <!-- Sidebar Starts --> 
                        <aside class="col-md-3 col-sm-4">
                            <div class="widget-wrap">
                                <h2 class="widget-title"> <span class="light-font">My</span> <strong>Account</strong> </h2>
                                <div class="divider-full-1"></div>
                                <ul class="cate-widget">
                                   <li> <i class="fa fa-arrow-circle-o-right clr-txt"></i>  <a href="/account-information"> Account Information </a></li>
                                    <li class="active"> <i class="fa fa-arrow-circle-o-right clr-txt"></i> <a href="/my-account"> My Account</a></li>                                        
                                    <li> <i class="fa fa-arrow-circle-o-right clr-txt"></i> <a href="/cng-pw"> Change Password</a></li>
                                    <li> <i class="fa fa-arrow-circle-o-right clr-txt"></i> <a href="/order-history"> Order History</a></li>
                                </ul>
                            </div>
                        </aside>   
                        <!-- Sidebar Ends --> 

                    </div>
                </div>
            </section>
            <!-- / My Account Ends -->        

            <!-- / CONTENT AREA -->


 @endsection

@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection