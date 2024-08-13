@extends('web.master')
@section('content') 
<section class="account-page ptb-50">
    <div class="container"> 
        <h2 class="section-title ptb-15" style="text-align: center;"> <span class="light-font">Wishlist </span> <strong>Product </strong>  </h2>
        <!-- Shopping Cart Starts -->
        <div class="cart-table">
            <form class="cart-form">    
                <table class="product-table">                   
                    <thead class="">        
                        <tr>
                            <th>Product Image </th>                                                                        
                            <th>Product Name</th>  
                            <th>Product Category</th> 
                            <th>Product Brand</th>                                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlists as $item)
                            <tr>
                                <td class="image">
                                    <div class="white-bg">
                                        <img class="prod-img" width="50px" src="{{ asset('images/product-images/'.$item->product->photo) }}" alt=""/>    
                                    </div>
                                </td>
                                <td class="description">
                                    <h4>{{$item->product->title}}</h4>                                                                                                                             
                                </td> 
                                <td> 
                                   {{$item->product->productCategory->name}}
                                </td>   
                                <td>
                                   {{$item->product->brand->name}}
                                </td>
                            </tr>     
                        @endforeach 
                    </tbody>                            
                </table>
          

              

            </form>
        </div>                    
        <!-- / Shopping Cart Ends -->
    </div>
</section>
@endsection