@extends('web.master')
@section('content')
    <section class="checkout">
        <h1 class="section-title ptb-15" style="text-align: center;"> <span class="light-font">Check</span> <strong>Out
            </strong> </h1>
            <div class="row">
                <form action="{{ route('order.store') }}" method="POST" role="form" id="checkout_form">
                    @csrf
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-5 px-md-1 pl-md-3 px-0 px-lg-3 px-sm-0">
                    <div class="bg-white border p-3">
                        <input type="hidden" id="price" name="price" value="9180">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <input type="hidden" name="ordertype" id="ordertype" value="12">
                                <label class="" for="name">Name*</label>
                                <input name="name" type="text" id="name" placeholder="Name" value=""
                                    class="form-control " required="">
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label class="" for="email">Email</label>
                                <input name="email" type="email" id="email" placeholder="Email" value=""
                                    class="form-control " required="">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-12 mb-2">
                                <label class="" for="mobile">Mobile*</label>
                                <input name="phone" type="tel" id="mobile" value=""
                                    class="form-control  onlyNumerics" placeholder="Mobile Number " pattern="[0-9]*"
                                    required="">
                            </div>
                            @php
                                $cities = App\Models\City::all();
                            @endphp
                            <div class="form-group col-lg-6 col-md-6 col-12 mb-2">
                                <label class="" for="city">City*</label>
                                <select name="city_id" id="" class="form-control select_city js_select_2">
                                    <option value="">Select Category</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-2">
                                <label class="" for="address">Address*</label>
                                <textarea name="address" class="form-control " placeholder="Address" row="2" id="address" required=""></textarea>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label class="" for="instructions">Special Instructions</label>
                                <textarea name="notes" class="form-control " row="2" id="instructions" placeholder="Instructions"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-6 px-0">
                        <div class="w-100">
                            <p class="bg-primary text-uppercase p-2 get_nav font-weight-semi-bold">Payment Method</p>
                            <div class="container ">
                                <div class="row">
                                    <div class="col-md-12 my-2">
                                        <div class="row">
                                            <div id="payment_box" class="col-lg-3 col-md-6 col-sm-6 col-6 my-2 pr-1 pl-0">
                                                <label
                                                    class=" cursor-pointer text-center rounded mx-1 py-2 border w-100 border-primary"
                                                    for="payment_methods4"><input  class="d-none"
                                                        type="radio" onchange="show_payment_description(this.value);"
                                                        id="payment_methods4" name="payment_method_id" value="1"
                                                        required="required"><img
                                                        src="https://www.bombaydryfruits.com/images/COD.webp" width="50"
                                                        height="50" alt=""><span
                                                        class="d-block text-capitalize font-weight-medium text-black font-size11"
                                                        >Cash On Delivery</span> </label>
                                            </div>
                                            <div id="payment_box" class="col-lg-3 col-md-6 col-sm-6 col-6 my-2 pr-1 pl-0">
                                                <label
                                                    class=" cursor-pointer text-center rounded mx-1 py-2 border w-100 border-primary"
                                                    for="payment_methods4"><input  class="d-none"
                                                        type="radio" onchange="show_payment_description(this.value);"
                                                        id="payment_methods4" name="payment_method_id" value="2"
                                                        required="required"><img
                                                        src="https://www.bombaydryfruits.com/images/COD.webp" width="50"
                                                        height="50" alt=""><span
                                                        class="d-block text-capitalize font-weight-medium text-black font-size11"
                                                        >Self Pick Up</span> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="/" class="slide-btn"> Continue </a>
                        <button type="submit" name="submit"
                            class="text-right font16 mbl_btn_checkout btn bg-primary rounded font-weight-bold float-right  btn-checkout  text-uppercase py-md-3 hvr-float-shadow">
                            Place Order
                        </button>
                    </div>
                </div>
                </form>

                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-7 px-md-1 pr-md-3 px-0 px-lg-3 px-sm-0">


                    <table class="table table-bordered mb-0 bg-white">
                        <thead>
                            <tr>
                                <th class="text-uppercase" style="
                                    width: 40%; text-align:center;
                                ">PRODUCT NAME</th>
                                <th class="text-uppercase" style="
                                    width: 15%; text-align:center;
                                ">QTY</th>
                                <th class="text-uppercase" style="
                                width: 23%; text-align:center;">Price</th>
                                <th class="text-uppercase" style="
                                    width: 22%; text-align:center;
                                ">Total Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                            <tr class="row_0 row_count_checkout">
                                <td class="boxis">
                                    <a class="media-link" href="/#"><img src="{{asset('images/product-images/'.$item->photo)}}" alt=""></a> 
                                    {{$item->name}} </p>
                                </td>
                                <td>
                                    <div class="prod-btns fontbold-2">
                                        <div class="quantity">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                                <input type="hidden" name="id" value="{{ $item->id}}" >
                                                <input title="Qty"  name="quantity" value="{{$item->quantity}}" class="form-control qty" type="number">
                                        </div>
                                          <button href="/checkout" class="btn btn-primary">update</button>
                                        </form>
                                    </div>
                                </td>
                                <td> 
                                    <div class="price fontbold-2"> 
                                        <strong class="fsz-20">Rs {{$item->price}} </strong>
                                    </div>
                                </td>
                                <td> 
                                    <div class="price fontbold-2"> 
                                        <strong class="fsz-20">Rs {{$item->price*$item->quantity}} </strong>
                                    </div>
                                </td>
                                <td> 
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button href="/checkout" class="remove fa fa-trash clr-txt"></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="btn btn-danger" href="javascript: void(0)"
                                        onclick="clearCart()">Delete All
                                    </a>
                                </td>
                            </tr>
                            <input type="hidden" id="checkout_items" value="1626,201,1022,1189">
                        </tbody>
                    </table>
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Delivery</h4>
                        <h4 class="text-danger">Free
                        </h4>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h4 class="text-muted">Subtotal
                            <span class="sub-pri">  Rs {{ Cart::getTotal() }}</span>
                        </h4>
                    </div>
                    {{-- <div class=" bg-white ">
                        <span id="loader_checkout" style="display:none; font-size: 40px;"
                            class="fa fa-spinner fa-spin float-right"></span>
                        <a href="/" class="slide-btn cont"> Continue </a>
                    </div> --}}
                </div>
            </div>
            </div>
            </div>
            </div>
    </section>
@endsection
@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection
@section('scripts')
<script>
    function clearCart() {
        // Assuming you have included the necessary JavaScript library for making AJAX requests
        // Example using axios:
        $.ajax({
            type: 'POST',
            url: '/clear',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle the response if needed
                // Refresh the page on success
                window.location.reload();

                console.log(response);
            },
            error: function(error) {
                // Handle errors if needed
                console.error(error);
            }
        });
    }
</script>
@endsection
