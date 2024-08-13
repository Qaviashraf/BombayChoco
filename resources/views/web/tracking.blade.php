@extends('web.master')
@section('content') 
<section class="tracking">
<div class="card">
    <div class="upper">
        <div class="row">
            <div class="col-8 heading">
                <h5><b>Track Your Order</b></h5>
            </div>
        </div>
        <form action="{{route('trackOrders')}}" method="GET">
            <div class="form-element">
                <span id="input-header">Order Number</span>
                <input type="text" id="order_id" name="reference" placeholder="BOMBAY/ORDER/123">
            </div>
    </div>
    <hr>
    <div class="lower">
        <button type="submit" class="btn">Track Order</button>
    </div>
    </form>
</div>
</section>
<section class="account-page ptb-50">
    <div class="container"> 
        <!-- Shopping Cart Starts -->
        <div class="cart-table">
            @if ($order != "" && isset($order))
                <table class="product-table">                   
                    <thead>        
                        <tr>                                                                       
                            <th>Product Name</th>  
                            <th>Quantity</th>
                            <th>Product Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $item)
                        <tr>
                            <td class="description">
                                <h4>{{$item->product->title}}</h4>                                                                                                                             
                            </td> 
                            <td>
                                <div class="prod-btns fontbold-2">
                                    <b class="fsz-16"> {{$item->quantity}} </b>
                                </div>
                            </td>
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">{{$item->sale_price}} </strong> 
                                </div>
                            </td> 
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">{{$item->sub_total}} </strong> 
                                </div>
                            </td>                                       
                        </tr> 
                            
                        @endforeach     

                    </tbody>                               
                </table>
                <table class="product-table">                   
                    <thead class="">        
                        <tr>                                                                       
                            <th>your name</th> 
                            <th>your email</th> 
                            <th>your phone number</th> 
                            <th>your address</th>
                            <th>your tracking id</th>
                            <th>Order Status</th>
                                                                    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16"> {{$order->customer->name }} </b> </div>
                            </td>  
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16"> {{$order->customer->email }} </b> </div>
                            </td> 
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16">{{$order->customer->phone}} </b> </div>
                            </td>  
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16"> {{$order->customer->address}} </b> </div>
                            </td> 
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16">{{$order->reference}}</b> </div>
                            </td>
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16">{{$order->orderStatus->name}}</b> </div>
                            </td> 
                                                           
                        </tr>      

                    </tbody>                               
                </table>

                <div class="continue-shopping text-center">
                    <a href="/shop" class="theme-btn btn"> Back to shop </a>
                </div>
            @endif
        </div>                    
        <!-- / Shopping Cart Ends -->
    </div>
</section>
@endsection


@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection