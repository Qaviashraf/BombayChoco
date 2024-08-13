@extends('web.master')
@section('content')
<div class="main-page-about">
            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/brands.jpg')}})">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">Shop By </strong> <span class="light-font">Brands </span> </h2>
                      
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
                            <h2 class="section-title ptb-15"> <span class="light-font">Shop By </span> <strong>Brands </strong>  </h2>
                            <div class="container-fluid"> 
                            <div class="col-md-12"> 
                            <div class="tab-content organic-content row"> 
                            <div id="product-tab-1" class="tab-pane fade active in"> 
                            <div class="product-slider-1 dots-1">  
                            <ul class="theme-tabs" id="categories">
                                <li class="active"><a href="#" data-toggle="tab" class="category-btn" data-id="1">Dry fruits</a></li>  
                             </ul>                             
                             <ul class="theme-tabs" id="categories">
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="2">Chocolates</a></li> 
                             </ul>
                             <ul class="theme-tabs" id="categories">                               
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="3">Fresh Biscuit</a></li>
                             </ul>
                             <ul class="theme-tabs" id="categories">                               
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="4">Gift Boxes</a></li>
                             </ul>
                             <ul class="theme-tabs" id="categories">
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="5">Fresh Biscuit</a></li> </ul>
                                <ul class="theme-tabs" id="categories">                               
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="6">Gift Boxes</a></li>
                                </ul>
                                {{-- <li class="active"><a href="#" data-toggle="tab" class="category-btn" data-id="1">Dry fruits</a></li>   
                                                              --}}
                               <ul class="theme-tabs" id="categories">
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="7">Chocolates</a></li>   </ul>
                                <ul class="theme-tabs" id="categories">                             
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="8">Fresh Biscuit</a></li> </ul>
                                <ul class="theme-tabs" id="categories">                               
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="9">Gift Boxes</a></li></ul>
                                <ul class="theme-tabs" id="categories">
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="10">Fresh Biscuit</a></li>  
                                </ul>
                                <ul class="theme-tabs" id="categories">                              
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="11">Gift Boxes</a></li>
                                </ul>
                        </div>
                    </div>
                    <div class="tab-content shop-content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="tab-pane fade active in productShopCards"  role="tabpanel">
                            
                                
                        </div>
                            </div>
                        </div>
                </div>
                <div class="rel-div pt-50">
                    <div class="divider-full-1"></div>
                    <div class="nav-page">
                        <a href="/#" class="fa fa-long-arrow-left left"></a> 
                        <a href="/#" class="fa fa-long-arrow-right right"></a> 
                    </div>
                </div> 
                <div class="pagination-wrap">
                    <ul class="pagintn">                                  
                        <li><a href="/#">01</a></li>
                        <li><a href="/#">02</a></li>
                        <li><a href="/#">03</a></li>
                        <li><a href="/#">04</a></li>
                        <li><a href="/#">05</a></li>
                        <li><a href="/#">...</a></li>
                        <li><a href="/#">15</a></li>                                    
                    </ul>
                </div>
                </div>
                </div>  
            </section>
      
<!-- / Shop Ends -->  
<!-- Subscribe Newsletter Starts-->
<section class="subscribe-wrap sec-space light-bg">
    <img alt="" src="assets/img/extra/sec-img-5.png" class="right-bg-img" />  
    <!-- <img src="{{asset('web-assets/images/product/chocolate.png')}}"  class="leftphp-bg-img" alt=""> -->
    <h4 class="sub-title"> JOIN OUR NEWSLETTER </h4>
                <h2 class="fsz-35"> <span class="light-font">subscribe </span> <strong> newsletter</strong> </h2>
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-2"> 
                
            </div>
            <div class="col-md-8"> 
                <form class="newsletter-form row">
                    <div class="form-group col-sm-8">
                        <input class="form-control" placeholder="enter your email address" required=""  type="text">                                                                                     
                    </div>
                    <div class="form-group col-sm-4">                                               
                        <button class="theme-btn btn-block" type="submit"> subscribe <i class="fa fa-long-arrow-right"></i> </button>                                            
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Subscribe Newsletter Ends -->

<!-- Testimonials Starts-->
<section class="">
    <div class="container"> 
        <div class="testimonials">     
            <div id="testimonial-slider" class="testimonial-slider nav-1"> 
                <div class="item"> 
                    <div class="testi-wrap"> 
                        <div class="testi-img"> 
                            <a href="/#">             <img src="{{asset('web-assets/images/review/1.jpg')}}" alt=""/>
                        </div>
                        <div class="testi-caption"> 
                            <p> <i>“Lorem ipsum dolor sit amet, consectetuer adipiscing elitsed the diam nonummy nibh euismod tincidunt.”</i> </p>
                            <a href="/#"> <i class="fa fa-user clr-txt"></i> <strong> LUIS GARCHIA </strong> </a>
                        </div>
                    </div>
                </div>
                <div class="item"> 
                    <div class="testi-wrap"> 
                        <div class="testi-img"> 
                            <a href="/#">             <img src="{{asset('web-assets/images/review/1.jpg')}}" alt=""/>
                        </div>
                        <div class="testi-caption"> 
                            <p> <i>“Lorem ipsum dolor sit amet, consectetuer adipiscing elitsed the diam nonummy nibh euismod tincidunt.”</i> </p>
                            <a href="/#"> <i class="fa fa-user clr-txt"></i> <strong> LUIS GARCHIA </strong> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials Ends -->

<!-- latest news Starts-->
<section class="sec-space">
    <div class="container"> 
        <div class="title-wrap">
            <h4 class="sub-title"> BOMBAY CHOCO & NUTS BLOG </h4>
            <h2 class="section-title"> <span class="light-font">Bombay </span> <strong>latest news </strong> </h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="latest-news">
                    <div class="news-img">
                        <img src="{{asset('web-assets/images/blog/1.png')}}" alt=""/>
                    </div>
                    <div class="news-caption">
                        <h4 class="sub-title-sm"> 26 JUNE 2016 </h4>
                        <h2 class="title-2"> <a href="/#"> <span class="light-font">5 best foods to make you </span> <strong>fresh & healthy</strong> </a> </h2>
                        <span class="divider-1"></span>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                        <a href="/#" class="fsz-12"> READ ARTICLE <i class="fa fa-long-arrow-right"></i> </a> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="latest-news">
                    <div class="news-img">
                        <img src="{{asset('web-assets/images/blog/2.png')}}" alt=""/>
                    </div>
                    <div class="news-caption">
                        <h4 class="sub-title-sm"> 26 JUNE 2016 </h4>
                        <h2 class="title-2"> <a href="/#"> <span class="light-font">5 best foods to make you </span> <strong>fresh & healthy</strong> </a> </h2>
                        <span class="divider-1"></span>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                        <a href="/#" class="fsz-12"> READ ARTICLE <i class="fa fa-long-arrow-right"></i> </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest news Ends -->    
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

        function displayProductCards(products) {
            let productsContainer = $(".productShopCards");
            productsContainer.empty(); // Clear previous products
            // Loop through the products and generate HTML for each product card
            $.each(products, function (index, product) {
                let productCard = `<div class="col-lg-3 col-md-4 col-sm-6"> 
                                    <div class="product-box"> 
                                        <div class="product-media"> 
                                            <img class="prod-img" src="{{asset('images/product-images/${product.photo}')}}" alt=""/>     
                                            <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                            <div class="prod-icons"> 
                                                <a href="#" class="fa fa-heart"></a>
                                                <a  href="/#product-preview" data-toggle="modal" class="fa fa-shopping-basket view-details-btn" data-product-id="${product.id}"></a>
                                            </div>
                                        </div>

                                        <div class="product-caption"> 
                                            <h3 class="product-title">
                                                <a href="#"> ${product.title}</a>
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
                                        <img id="myimage"  src="{{asset('images/product-images/${product.photo}')}}" data-image="${product.photo}" width="300" alt=""/>
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

                                            <div class="fsz-16">
                                                <p>${product.description}</p>
                                            </div>

                                            <div class="prod-btns">
                                                <div class="quantity">
                                                    <input title="Qty" id="quatity" value="1" name="quantity" min="1" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <ul class="meta">
                                                <li class="tags-widget" id="variantsContainer"> 
                                                    <strong>Variants:</strong>
                                                    ${product.product_variants.map(variant => `
                                                        <span class="weight-option" data-variant="${variant.id}" data-price="${variant.sale_price}"><a href="/#">${variant.weight} </a></span>
                                                    `).join('')}
                                                </li>
                                                <li> <strong>CATEGORY:</strong><span> ${product.product_category.name}</span> </li>
                                            </ul>
                                            <div class="divider-full-1"></div>
                                            <div class="add-cart pt-15">
                                                <a href="/#" class="theme-btn js-add-product  add-to-cart-btn" data-product-id="${product.id}"> <strong> ADD TO CART </strong> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>  
                        </div>
                        </div>
                    </div>`);

        //     // Add event listener to the weight options
        //     $('.weight-option').on('click', function() {
        //         const selectedWeight = $(this).data('price');
        //         updatePrice(selectedWeight);
        //     });

        //     // Set the default price to be the price of the first variant
        //     const defaultPrice = product.product_variants[0].sale_price;
        //     updatePrice(defaultPrice);

        //     // Function to update the displayed price
        //     function updatePrice(newPrice) {
        //         console.log(newPrice)
        //         $('.saleprice').text('Rs' + newPrice);
        //     }
        // }
        
        // function addToCart(productId) {
        //     // Perform the necessary logic to add the product to the cart
        //     // You may want to make another AJAX request to a server endpoint
        //     console.log(productId);
        //     // Add your cart handling logic here
        // }
         // Set the default price to be the price of the first variant
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
                    $('.modal-open').on('click', '.add-to-cart-btn', function () {
                        // console.log(123)
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
                            // location.reload();
                        },
                        error: function (error) {
                            console.error('Error adding to cart:', error);
                        }
                    });
                }
    });
</script>
@endsection


