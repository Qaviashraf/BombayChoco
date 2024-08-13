@extends('web.master')
@section('content') 

            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg"  style="background-image:url({{asset('web-assets/images/banner/shop.jpg')}})">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">Bombay </strong> <span class="light-font">Shop </span> </h2>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="/#"> Home </a> SHOP  </li>                             
                        </ol>
                    </div>  
                </div>
            </section>
            <!--Breadcrumb Section End-->


            <!-- Shop Starts-->
            <section class="shop-wrap sec-space-bottom">
                <div class="pattern"> 
                    <img alt="" src="assets/img/icons/white-pattern.png">
                </div>

                <div class="container rel-div">
                    <div class="row sort-bar">
                        {{-- <div class="icon"> <img alt="" src="assets/img/logo/logo-2.png" /> </div> --}}
                        <div class="col-lg-6">
                            <div class="sort-dropdown left">
                                <span>CATEGORY</span>
                                <div class="search-wrap">
                                    <input class="form-control" placeholder="" >
                                    <button class="btn" type="submit"> <i class="fa fa-search"></i> </button>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5 right">
                            <div class="sort-dropdown">
                                <span>BY PRICE</span>
                                <div class="search-selectpicker selectpicker-wrapper">
                                    <select class="selectpicker input-price"  data-width="100%"
                                            data-toggle="tooltip">                                   
                                        <option> Low to High </option>
                                        <option> High to Low </option>
                                    </select>
                                </div>
                            </div>
                            <div class="sort-dropdown">
                                <span>SORT BY</span>
                                <div class="search-selectpicker selectpicker-wrapper">
                                    <select class="selectpicker input-price"  data-width="100%"
                                            data-toggle="tooltip">
                                        <option>Popular item</option>
                                        <option>A - Z</option>
                                        <option>Z - A</option>
                                        <option> Low - High </option>
                                        <option> High - Low </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="divider-full-1"></div>

                    <div class="row">
                        <div class="col-md-3 pt-15">
                            <div class="widget-wrap">
                                <h2 class="widget-title"> <span class="light-font">Refine by</span> <strong>category</strong> </h2>
                                <div class="divider-full-1"></div>
                                <ul class="checkbox-widget">
                                    <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked="">Fruits
                                        <ul class="checkbox-widget">
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked=""> <span>Deals of the day</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox"> <span>Fresh shipping</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked=""> <span>Best sellers</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox"> <span>Featured products</span></label> </li>                                    
                                        </ul>
                                    </li>
                                    <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked="">Fruits
                                        <ul class="checkbox-widget">
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked=""> <span>Deals of the day</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox"> <span>Fresh shipping</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked=""> <span>Best sellers</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox"> <span>Featured products</span></label> </li>                                    
                                        </ul>
                                    </li>
                                    <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked="">Fruits
                                        <ul class="checkbox-widget">
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked=""> <span>Deals of the day</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox"> <span>Fresh shipping</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox" checked=""> <span>Best sellers</span></label> </li>
                                            <li class="form-group"><label class="checkbox-inline"><input value="" type="checkbox"> <span>Featured products</span></label> </li>                                    
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="widget-wrap">
                                <h2 class="widget-title"> <span class="light-font">Sort by</span> <strong>Price Range</strong> </h2>
                                <div class="divider-full-1"></div>
                                <div class="sort-range pt-15">
                                    <span>PRICE</span> <div id="price-range"></div>
                                </div>
                            </div>

                            <div class="widget-wrap">
                                <h2 class="widget-title"> <span class="light-font">Best</span> <strong>Sellers</strong> </h2>
                                <div class="divider-full-1"></div>
                                <div class="widget-post pt-15">
                                    <div class="random-prod"> 
                                        <div class="random-img"> 
                                            <img alt="" src="assets/img/extra/post-xs-1.png">
                                        </div>
                                        <div class="random-text"> 
                                            <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>blackberry </strong> </a> </h3>
                                            <span class="divider"></span>
                                            <div class="price"> 
                                                <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="random-prod"> 
                                        <div class="random-img"> 
                                            <img alt="" src="assets/img/extra/post-xs-2.png">
                                        </div>
                                        <div class="random-text"> 
                                            <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>peach </strong> </a> </h3>
                                            <span class="divider"></span>
                                            <div class="price"> 
                                                <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="random-prod"> 
                                        <div class="random-img"> 
                                            <img alt="" src="assets/img/extra/post-xs-3.png">
                                        </div>
                                        <div class="random-text"> 
                                            <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>redberry </strong> </a> </h3>
                                            <span class="divider"></span>
                                            <div class="price"> 
                                                <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="random-prod"> 
                                        <div class="random-img"> 
                                            <img alt="" src="assets/img/extra/post-xs-4.png">
                                        </div>
                                        <div class="random-text"> 
                                            <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>grapes </strong> </a> </h3>
                                            <span class="divider"></span>
                                            <div class="price"> 
                                                <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-wrap">
                                <h2 class="widget-title"> <span class="light-font">Sort by</span> <strong>Tags</strong> </h2>
                                <div class="divider-full-1"></div>
                                <ul class="tags-widget">
                                    <li> <a href="/#">fruits</a> </li>
                                    <li> <a href="/#">vegetables</a> </li>
                                    <li> <a href="/#">juices</a> </li>
                                    <li> <a href="/#">natural food</a> </li>
                                    <li> <a href="/#">food</a> </li>
                                    <li> <a href="/#">Breads</a> </li>
                                    <li> <a href="/#">natural</a> </li>
                                    <li> <a href="/#">healthy</a> </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="result-bar block-inline">
                                <h4 class="result-txt">search result <b> 125 </b> </h4>
                                <ul class="view-tabs">
                                    <li class="">
                                        <a href="/#grid-view" data-toggle="tab">                                                    
                                            <i class="fa fa-th"></i>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="/#list-view" data-toggle="tab">
                                            <i class="fa fa-th-list"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div  class="tab-content shop-content">
                                <div id="grid-view" class="tab-pane fade active in "  role="tabpanel">
                                </div>
                                <div id="list-view" class="tab-pane fade productShopCards" role="tabpanel">
                                </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- / Shop Ends -->      

            <!-- / CONTENT AREA -->

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
                let productCard = `<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-3 col-md-4 col-sm-6"> 
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
        // function displayProductDetails(product) {
        //     const modalBody = $('#product-preview');
        //     // Clear existing product details
        //     modalBody.empty();
        //     // Display product details in the modal
        //     modalBody.append(`<div class="modal-dialog modal-lg product-modal">
        //         <div class="modal-content">
        //             <a aria-hidden="true" data-dismiss="modal" class="sb-close-btn close" href="/#"> <i class=" fa fa-close"></i> </a>                 

        //             <div class="product-single pb-50 clearfix">
        //                 <!-- Single Products Slider Starts --> 
        //                 <div class="col-lg-6 col-sm-8 col-sm-offset-2 col-lg-offset-0 pt-50">
        //                     <div class="prod-slider sync1">
        //                         <div class="item"> 
        //                         <img src="{{asset('images/product-images/${product.photo}')}}" width="300" alt=""/>
        //                             <a href="/assets/img/products/prod-big-1.png" data-gal="prettyPhoto[prettyPhoto]" title="Product" class="caption-link"><i class="arrow_expand"></i></a>
        //                         </div>
        //                     </div>
        //                 </div>
        //                 <!-- Single Products Slider Ends --> 

        //                 <div class="col-lg-6 pt-50">
        //                     <div class="product-content block-inline">

        //                         <div class="tag-rate">
        //                             <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
        //                             <div class="rating">
        //                                 <span class="star active"></span>
        //                                 <span class="star active"></span>
        //                                 <span class="star active"></span>
        //                                 <span class="star active"></span>
        //                                 <span class="star active"></span>
        //                                 <span class="fsz-12"> Based on 25 reviews</span>
        //                             </div>
        //                         </div>

        //                         <div class="single-caption"> 
        //                             <h3 class="section-title">
        //                                 <a href="/#"><strong>${product.title}</strong></a>
        //                             </h3>
        //                             <span class="divider-2"></span>
        //                             <p class="price"> 
        //                                 <strong class="clr-txt fsz-20 saleprice"></strong>
        //                             </p>

        //                             <div class="fsz-16">
        //                                 <p>${product.description}</p>
        //                             </div>

        //                             <div class="prod-btns">
        //                                 <div class="quantity">
        //                                     <input title="Qty" name="quantity" placeholder="1" min="1" class="form-control qty" type="number">
        //                                 </div>
        //                             </div>
        //                             <ul class="meta">
        //                                 <li class="tags-widget" id="variantsContainer"> 
        //                                     <strong>Variants:</strong>
        //                                     ${product.product_variants.map(variant => `
        //                                         <span class="weight-option" data-price="${variant.sale_price}"><a href="/#">${variant.weight} </a></span>
        //                                     `).join('')}
        //                                 </li>
        //                                 <li> <strong>CATEGORY:</strong><span> ${product.product_category.name}</span> </li>
        //                             </ul>
        //                             <div class="divider-full-1"></div>
        //                             <div class="add-cart pt-15">
        //                                 <a href="/#" class="theme-btn btn add-to-cart-btn" data-product-id="${product.id}"> <strong> ADD TO CART </strong> </a>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </div> 
        //             </div>  

        //         </div>
        //     </div>`);

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
    });
</script>
@endsection