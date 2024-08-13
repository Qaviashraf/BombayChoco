@extends('web.master')
@section('content')

            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/cart.jpg')}})">                
                <div class="theme-container container ">                       
                    {{-- <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">Bombay</strong> <span class="light-font">Shop </span> </h2>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="/#"> Home </a> Shopping Cart  </li>                             
                        </ol>
                    </div>   --}}
                </div>
            </section>
            <!--Breadcrumb Section End-->


            <!-- Cart Starts-->
            <section class="shop-wrap sec-space">
                <div class="container"> 
                    <!-- Shopping Cart Starts -->
                    <div class="cart-table">
                        <form class="cart-form">
                            <table class="product-table">
                                <thead class="">
                                    <tr>                                                                       
                                        <th></th>  
                                        <th>Product Name</th> 
                                        <th>quantity</th>                                 
                                        <th>Product price</th> 
                                        <th></th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="image">
                                            <div class="white-bg">
                                                <a class="media-link" href="#"> <img src="{{asset('images/product-images/'.$item->photo)}}" width="70" alt=""></a> 
                                            </div>
                                        </td>
                                        <td>
                                            <h3 class="product-title no-margin"> <a href="#"> <span class="light-font">{{$item->name}}</a> </h3>
                                        </td>   
                                        <td>
                                            <div class="prod-btns fontbold-2">
                                                <div class="quantity">
                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id}}" >
                                                        <input title="Qty"  name="quantity" value="{{$item->quantity}}" class="form-control qty" type="number">
                                                </div>
                                                  <button type="submit" class="btn btn-primary">update</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="price fontbold-2"> 
                                                <strong class="fsz-20">Rs {{$item->price}} </strong>
                                            </div>
                                        </td> 
                                        <td> 
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <button href="/#" class="remove fa fa-close clr-txt"></button>
                                            </form>
                                        </td>  
                                    </tr>   
                                    @endforeach
                                </tbody>                               
                            </table>

                            <div class="continue-shopping">
                                <div class="right"> <strong class="fsz-20 fontbold-2">Subtotal : <span class="clr-txt"> Rs {{ Cart::getTotal() }} </span> </strong> </div>
                            </div>

                            <div class="shp-btn col-sm-12 text-center">
                                <a href="/" class="theme-btn-2 btn"> <b> CONTINUE SHOPPING </b> </a>
                                <a href="/checkout" class="theme-btn-3 btn"> <b>     CHECKOUT NOW </b> </a>
                            </div>                                   
                        </form>
                    </div>                    
                    <!-- / Shopping Cart Ends -->
                </div>
            </section>
            <!-- / Cart Ends -->      

            <!-- / CONTENT AREA -->


@endsection

@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection