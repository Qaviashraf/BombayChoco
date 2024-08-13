<@extends('web.master')
@section('content')
            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/account.jpg')}})">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <span class="light-font">about </span> <strong class="clr-txt">naturix </strong> <span class="light-font">farmfood </span> </h2>
                       
                    </div>  
                </div>
            </section>
            <!--Breadcrumb Section End-->

            <!-- forgot password Starts-->
            <section class="sec-space">
                <div class="container"> 
                    <div class="col-sm-6 col-sm-offset-3 text-center">     
                        <div class="login-wrap">
                            <h3 class="fsz-30"><span class="light-font">forgot </span> <strong>password </strong>  </h3>
                            <span class="divider-1"></span>

                            <form class="login-form row pt-50">                           
                                <div class="form-group col-sm-12">
                                    <input required="" type="text" data-original-title="Email is required" class="form-control email input-email" placeholder="Password" name="cf_email" value="" data-toggle="tooltip" data-placement="bottom" title="">
                                </div>                           
                                <div class="form-group col-sm-12 pt-15">
                                    <button type="submit" class="theme-btn btn submit-btn"> <b> Reset My Password </b> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- / forgot password Ends -->        

            <!-- / CONTENT AREA -->

         @endsection