@extends('web.master')
@section('content')

            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb">                        
                        <h2 class="section-title"> <span class="light-font">my </span> <strong class="clr-txt">account </strong> </h2>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="/"> Home </a> Your Order History  </li>                             
                        </ol>
                    </div>  
                </div>
            </section>
            <!--Breadcrumb Section End-->

            <!-- My Account Starts-->
            <section class="account-page ptb-50">
                <div class="container"> 
                    <!-- Shopping Cart Starts -->
                    <div class="cart-table">
                        <form class="cart-form">    
                            <table class="product-table">                   
                                <thead class="">        
                                    <tr>                                                                       
                                        <th>Order Number</th>  
                                        <th>Order Date</th> 
                                        <th>Customer Name</th> 
                                        <th>Total Amount</th> 
                                        <th>Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderHistory as $item)
                                    <tr>
                                        <td>
                                            {{$item->reference}}    
                                        </td> 
                                        <td> 
                                            <div class="text-center pt-20"> <b class="fsz-16"> {{ $item->order_date }} </b> </div>
                                        </td> 
                                        <td>
                                            <div class="prod-btns fontbold-2">
                                                <b class="fsz-16"> {{ $item->customer->name }} </b>
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="price fontbold-2"> 
                                                <strong class="fsz-20">{{ $item->sub_total }}  </strong> 
                                            </div>
                                        </td> 
                                        <td>
                                           <span class="badge badge-primary"> {{$item->orderStatus->name}}</span>
                                        </td>                                      
                                    </tr>      
                                    @endforeach
                                </tbody>                               
                            </table>

                            <div class="continue-shopping text-center">
                                <a href="/my-account" class="theme-btn btn"> Back to account </a>
                            </div>

                        </form>
                    </div>                    
                    <!-- / Shopping Cart Ends -->
                </div>
            </section>
            <!-- / My Account Ends -->        

            <!-- / CONTENT AREA -->

   @endsection