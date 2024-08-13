@extends('web.master')
@section('content')
    <section class="thankyou-page" style=" background-image: url({{ asset('web-assets/images/product/thanks.jpg') }}) ;">
        <div class="thankyou-container">
            <h1 class="section-title ptb-15" style="text-align: center;"> <span class="light-font">Thank</span> <strong>You
                </strong> </h1>
            <p>Your order has been placed successfully.</p>
            <p>We appreciate your business and hope to see you again soon.</p>

        </div>

    </section>

    <div class="thankyou-sumary"style="margin: 0 auto; padding: 50px">
        <div class="woocommerce-order">
            <h2 class="section-title ptb-15" style="text-align: center;"> <span class="light-font">Order</span>
                <strong>Summary </strong> </h2>
            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                <li class="woocommerce-order-overview__order order">
                    Order number: <strong>{{ session('data')->reference }}</strong>
                </li>
                <li class="woocommerce-order-overview__date date">
                    Date: <strong>{{ session('data')->order_date }}</strong>
                </li>
                <li class="woocommerce-order-overview__total total">
                    Total: <strong><span class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol"></span>{{ session('data')->sub_total }}</span></strong>
                </li>
                <li class="woocommerce-order-overview__payment-method method">
                    Payment method: <strong>{{session('data')->paymentMethod->name}}</strong>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-12">
                    <div class="w-100 border">
                        <p class="bg-primary text-uppercase p-2 get_nav font-weight-semi-bold" style="text-align: center">
                            REVIEW YOUR ORDER</p>
                    </div>
                    <table class="table table-bordered mb-0 bg-white">
                        <thead>
                            <tr>
                                <th class="text-uppercase">PRODUCT NAME</th>
                                <th class="text-uppercase" style="
                                    width: 15%;
                                ">QTY</th>
                                <th class="text-uppercase">Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        @if(session('cart'))
                        <tbody>
                          @foreach(session('cart') as $item)
                            <tr class="row_0 row_count_checkout">
                                <td>
                                    <p class="font-size12">{{$item->name}} </p>
                                </td>
                                <td class="px-0 px-sm-0 px-md-2 px-lg-2">
                                    <div class=" cart-qty-btn">
                                        <p>{{$item->quantity}}</p>
                                    </div>
                                </td>
                                <td>
                                    <p>Rs.<span id="cart_row_price0">{{$item->price}}</span></p>
                                </td>
                                <td>
                                    <p>Rs.<span id="cart_row_price0">{{$item->price*$item->quantity}}</span></p>
                                </td>
                            </tr>
                          @endforeach
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h4>Total Amount {{session('data')->sub_total}}</h4></td>
                          </tr>
                        </tbody>
                            
                        @endif
                    </table>
                </div>
                <div class="text-center">
                  <a href="/" class="slide-btn"> Continue</a>
                </div>
            </div>
            <div class="container px-md-0">
                <div class="col-12 p-0">
                    <div
                        class="col-5 col-lg-12 col-md-12 py-0 py-lg-2 py-md-4 py-sm-0 mt-0 mt-lg-2 mt-md-2 mt-sm-0 mbl_checkout px-0 px-lg-0 px-md-0 px-sm-0 ">
                        <div class=" bg-white ">
                            <span id="loader_checkout" style="display:none; font-size: 40px;"
                                class="fa fa-spinner fa-spin float-right"></span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div> <!-- woocommerce-order -->
    </div>
@endsection

@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection