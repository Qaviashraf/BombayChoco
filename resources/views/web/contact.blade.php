@extends('web.master')
@section('content')

            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/Contact1.jpg')}})">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">Contact Us </strong> <span class="light-font"> </span> </h2>
                        {{-- <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="/#"> Home </a> Contact  </li>                             
                        </ol> --}}
                    </div>  
                </div>
            </section>
            <!--Breadcrumb Section End-->


            <!-- Shop Starts-->
            <section class="contact-wrap sec-space-bottom">
                <div class="container rel-div pt-50">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="contact-map">  <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14478.651471001156!2d67.0880623!3d24.8753615!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb3137aa95554c5%3A0x4f16e074318d1ff9!2sBOMBAY%20CHOC%20N%20NUTS!5e0!3m2!1sen!2s!4v1697829086108!5m2!1sen!2s" width="747" height="525" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div> </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="contact-details">
                                <h3 class="fsz-25"><span class="light-font">Bombay Choc N Nuts </span> <strong>Address </strong>  </h3> 
                                

                                <h5 class="clr-txt fsz-12 pt-15">Bombay Choc N Nuts STORE</h5>
                                <p>Showroom # 2, 34 F, Muhammad Ali Cooperative Housing Society, Karachi</p>

                                <ul>
                                    <li> <strong>Whatsapp:  </strong> <i><a href="https://api.whatsapp.com/send?phone=03300266229" 
                                        target="_blank" data-target="html">0330 0266229</a></i> </li>
                                    <li> <strong>Email: </strong> <i> <a href='mailto: info@bombaychoconnuts.com'>info@bombaychoconnuts.com</a> </i> </li>
                                    {{-- <li> <strong>Skype: </strong> <i> <a href='#'> Montero.Property </a> </i> </li> --}}
                                    <li> <strong>Facebook: </strong> <i>  <a href='https://web.facebook.com/bombaychocnnuts/?_rdc=1&_rdr'> Explore Bombay choco n nuts Facebook </a> </i> </li>
                                    <li> <strong>Instagram: </strong> <i>  <a href='https://www.instagram.com/bombaychocnnuts/'>Explore Bombay choco n nuts Instagram </a> </i> </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="divider-full-1"></div>

                    <div class="pt-50 col-md-8 col-md-offset-2">
                        <h3 class="fsz-25 text-center"><span class="light-font">Contact </span> <strong>Bombay Choco N Nuts </strong>  </h3> 
                        <h6 class="sub-title-1 text-center">ORGANIC STORE</h6>

                        <div class="contact-form pt-50">
                            <form class="contact-form row" id="contact-form">
                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Name" name="Name" id="Name" required="" type="text">
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Email" name="Email" id="Email" required="" type="email">
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Phone" name="Phone" id="Phone" type="text">
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control"  placeholder="Message" name="Message" id="Message" cols="12" rows="4"></textarea>
                                </div>
                                <div class="form-group col-sm-12 text-center pt-15">                                               
                                    <button class="theme-btn" type="submit"> <strong> SEND EMAIL </strong> </button>                                            
                                </div>
                            </form>
                        </div>
                    </div>

                </div>                
            </section>
            <!-- / Shop Ends -->      

            <!-- / CONTENT AREA -->

            @endsection
@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection