@extends('web.master')
@section('content')
<div class="main-page-about">
            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/shop.jpg')}})">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">Gift </strong> <span class="light-font">Bundle </span> </h2>
                      
                    </div>  
                </div>
            </section>
            <!--Breadcrumb Section End-->
            <section class="shop-wrap sec-space-bottom">
                <div class="pattern"> 
                    <img alt="" src="assets/img/icons/white-pattern.png">
                </div>

                <div class="container rel-div">
                    <div class="organic-wrap"> 
                        {{-- <img class="logo-img" alt style="
                    width: 120px;" src="{{asset('web-assets/images/bombaylogo.png')}}" /> --}}
                        
                        <div class="tabs-box">
                            <h2 class="section-title ptb-15"> <span class="light-font">Shop By </span> <strong>Gift Bundles </strong>  </h2>
                            {{--  --}}
                    </div>
                    <div class="tab-content shop-content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="tab-pane fade active in productShopCards giftbundles"  role="tabpanel">
                            
                                
                        </div>
                            </div>
                        </div>
                </div>
                </div>
                </div>  
            </section>
      
<!-- / Shop Ends -->      
@endsection

@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
    // Function to fetch and display products
        function fetchAndDisplayProducts(id) {
            $.ajax({
                url: '/products/filter/' + id,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    displayProductCards(data.products);
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Display products for the default category on page load
        $(document).ready(function () {
            // Replace 'defaultCategory' with your actual default category
            const defaultCategory = '1';

            fetchAndDisplayProducts(defaultCategory);

            // Set up click event for category buttons
            $('.category-btn').on('click', function () {
                const selectedCategory = $(this).data('id');
                fetchAndDisplayProducts(selectedCategory);
            });

            // Set up click event for "Add to Cart" buttons
            $('.productShopCards').on('click', '.add-to-cart-btn', function () {
                const productId = $(this).data('product-id');
                addToCart(productId);
            });

            // Set up click event for "View Details" buttons
            $('.productShopCards').on('click', '.view-details-btn', function () {
                const productId = $(this).data('product-id');
                fetchProductDetails(productId);
            });
        });
        var productDetailsRoute = "{{ route('productDetails', ['category' => ':category','product' => ':product']) }}";
        function displayProductCards(products) {
            let productsContainer = $(".productShopCards");
            productsContainer.empty(); // Clear previous products
            // Loop through the products and generate HTML for each product card
            $.each(products, function (index, product) {
                var productId = product.id;
                var categoryName = product.product_category.slug;
                var slug = product.slug;
                // Create a new 'a' (anchor) element
                var linkElement = document.createElement("a");

                // Set the 'href' attribute using the template string
                linkElement.href = productDetailsRoute.replace(':category', encodeURIComponent(categoryName))
                .replace(':product', encodeURIComponent(slug));
                let productCard = `<div class="col-lg-3 col-md-4 col-sm-6"> 
                                    <div class="product-box"> 
                                        <div class="product-media" style="background-color: ${product.product_category.color_code} !important; background-image: url({{ asset('web-assets/images/banner/text.png') }})">  
                                            <a href="${linkElement}">
                                                <img class="prod-img drift-demo-trigger " data-zoom="{{ asset('images/product-images/${product.photo}') }}" src="{{ asset('images/product-images/${product.photo}') }}" alt=""/>     
                                            </a>     
                                            <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                            <div class="prod-icons"> 
                                                @if(Auth::user())
                                                    <form action="{{ route('wishlist.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="${product.id}" />
                                                        <button type="submit" class="fa fa-heart"></button>
                                                    </form>
                                                @else
                                                    <a href="/wishlist" class="fa fa-heart"></a>
                                                @endif
                                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-shopping-basket view-details-btn" data-product-id="${product.id}"></a>
                                               
                                            </div>
                                        </div>

                                        <div class="product-caption"> 
                                            <h3 class="product-title">
                                                <a href="${linkElement}"> ${product.title}</a>
                                            </h3>
                                            <div class="price"> 
                                                <strong class="clr-txt">Rs ${product.product_variants[0].sale_price}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             `;
                // Append the product card HTML to the products container
                productsContainer.append(productCard);
            });
            // Implement the logic to display the filtered products in the 'products' section
            // For example, you can loop through the products and update the HTML
        }
        function fetchProductDetails(productId) {
        // Assuming you have an API endpoint to fetch product details
            $.ajax({
                url: '/api/getProductById/' + productId,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    displayProductDetails(data);
                },
                error: function (error) {
                    console.error('Error fetching product details:', error);
                }
            });
        }

        function displayProductDetails(product) {
            const modalBody = $('#product-preview');
            // Clear existing product details
            modalBody.empty();
            // Display product details in the modal
            modalBody.append(`<div class="modal-dialog modal-lg product-modal">
                        <div class="modal-content">
                            <a aria-hidden="true" data-dismiss="modal" class="sb-close-btn close" href="/#"> <i class=" fa fa-close"></i> </a>                 

                            <div class="product-single pb-50 clearfix">
                                <!-- Single Products Slider Starts --> 
                                <div class="row">
                                <div class="col-lg-6 col-sm-6 col-sm-offset-2 col-lg-offset-0 pt-50">
                                    <div class="prod-slider sync1">
                                    
                              <div id='slideshow-items-container'>
                                        <div class="item slideshow-items img-zoom-container"> 
                                        <img id="imgZoom" onmousemove="zoomIn(event)" onmouseout="zoomOut()"  src="{{asset('images/product-images/${product.photo}')}}" data-image="${product.photo}" width="300" alt=""/>
                                        <div id="overlay" onmousemove="zoomIn(event)"></div>
                                        <div id="myresult" class="img-zoom-result"></div>
                                            <a href="/assets/img/products/prod-big-1.png" data-gal="prettyPhoto[prettyPhoto]" title="Product" class="caption-link"><i class="arrow_expand"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Single Products Slider Ends --> 

                                <div class="col-lg-6 pt-50">
                                    <div class="product-content block-inline">

                                        <div class="tag-rate">
                                            <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="fsz-12"> Based on 25 reviews</span>
                                            </div>
                                        </div>

                                        <div class="single-caption"> 
                                            <h3 class="section-title">
                                                <a href="/#"><strong>${product.title}</strong></a>
                                            </h3>
                                            <span class="divider-2"></span>
                                            <p class="price"> 
                                                <strong class="clr-txt fsz-20 saleprice"></strong>
                                            </p>


                                            <div class="prod-btns">
                                                <div class="quantity">
                                                    <input title="Qty" id="quatity" value="1" name="quantity" min="1" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <ul class="meta">
                                                <li class="tags-widget" id="variantsContainer"> 
                                                    <strong>Variants:</strong>
                                                    ${product.product_variants.map(variant => `
                                                        <span class="weight-option" data-variant="${variant.id}" data-price="${variant.sale_price}"><a href="#">${variant.weight} </a></span>
                                                    `).join('')}
                                                </li>
                                                <li> <strong>CATEGORY:</strong><span> ${product.product_category.name}</span> </li>
                                            </ul>
                                            <div class="divider-full-1"></div>
                                            <div class="add-cart pt-15">
                                                <a href="#" class="theme-btn js-add-product  add-to-cart-btn" data-product-id="${product.id}"> <strong> ADD TO CART </strong> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>  
                        </div>
                        </div>
                    </div>`);

                    // Add event listener to the weight options
                    // Set the default price to be the price of the first variant
                    const defaultPrice = product.product_variants[0].sale_price;
                    updatePrice(defaultPrice);

                    // Function to update the displayed price
                    function updatePrice(newPrice) {
                        $('.saleprice').text('Rs' + newPrice);
                    }
                    var variantId = product.product_variants[0].id;
                     // Add event listener to the weight options
                     $('.weight-option').on('click', function() {
                        const selectedWeight = $(this).data('price');
                        variantId = $(this).data('variant');
                        updatePrice(selectedWeight);
                    });

                    // Set up click event for "Add to Cart" buttons
                    $('#product-preview').on('click', '.add-to-cart-btn', function () {
                        var productId = $(this).data('product-id');
                        var quantity = document.getElementById('quatity').value;
                        var variant_id = variantId;
                       array=[{
                            'product_id': parseInt(productId),
                            'quantity': parseInt(quantity),
                            'variant_id': parseInt(variant_id),
                        }];
                        addToCart(array);
                    });
                    // $('.modal-open').on('click', '.add-to-cart-btn', function () {
                    //     // console.log(123)
                    //     var productId = $(this).data('product-id');
                    //     var quantity = document.getElementById('quatity').value;
                    //     var variant_id = variantId;
                    //    array=[{
                    //         'product_id': parseInt(productId),
                    //         'quantity': parseInt(quantity),
                    //         'variant_id': parseInt(variant_id),
                    //     }];
                    //     addToCart(array);
                    // });
                }
        
                function addToCart(data) {
                    // Get the CSRF token from the meta tag
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    // Make an AJAX request to add the product to the cart
                    $.ajax({
                        url: '{{ route("cart.store") }}',
                        method: 'POST',
                        data: {
                            product_id: data[0].product_id,
                            quantity: data[0].quantity,
                            variant_id: data[0].variant_id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function (response) {
                            $('#product-preview').hide();
                            location.reload();
                            openCart();
                        },
                        error: function (error) {
                            console.error('Error adding to cart:', error);
                        }
                    });
                }
                $(document).ready(function() {
                    openCart(); // Call openCart when the document is ready
                });
    });
</script>
@endsection


