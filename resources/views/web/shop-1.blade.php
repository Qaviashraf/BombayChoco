@extends('web.master')
@section('content')
    <!--Breadcrumb Section Start-->
    <section class="breadcrumb-bg"
        style=" background: linear-gradient(0deg, #333333ad, #000000b0), url(http://127.0.0.1:8000/web-assets/images/banner/Syrup.jpg);
    background-size: cover;">
        <div class="theme-container container ">
            <div class="site-breadcumb white-clr">
                <h2 class="section-title"> <strong class="clr-txt">Bombay </strong> <span class="light-font">Shop </span> </h2>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li> <a href="/#"> Home </a> SHOP </li>
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

        <div class="container rel-div shop-width">
            <div class="row sort-bar">
                <div class="col-lg-6">
                    <div class="sort-dropdown left">
                        <span>Products</span>
                        <div class="search-wrap">
                            <input class="form-control" placeholder="">
                            <button class="btn" type="submit"> <i class="fa fa-search"></i> </button>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 right">
                    <div class="sort-dropdown">
                        <span>BY PRICE</span>
                        <div class="search-selectpicker selectpicker-wrapper">
                            <select class="selectpicker input-price" data-width="100%" data-toggle="tooltip">
                                <option> Low to High </option>
                                <option> High to Low </option>
                            </select>
                        </div>
                    </div>
                    <div class="sort-dropdown">
                        <span>SORT BY</span>
                        <div class="search-selectpicker selectpicker-wrapper">
                            <select class="selectpicker input-price" data-width="100%" data-toggle="tooltip">
                                <option>A - Z</option>
                                <option>Z - A</option>
                            </select>
                        </div>

                    </div>
                    <div class="tab-content shop-content">
                        <div id="grid-view" class="tab-pane fade active in " role="tabpanel">
                        </div>
                        <div id="list-view" class="tab-pane fade productShopCards" role="tabpanel">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-5 px-md-2 px-0">
                        <div class="result-count">
                            <div class="col-switch flex justify-content-end">
                                <span class="cursor-pointer pr six  mr-2" data-col="2"></span>
                                <span class="cursor-pointer pr four  mr-2 " data-col="3"></span>
                                <span class="cursor-pointer pr three  mr-2 active" data-col="4"></span>
                                <span class="cursor-pointer pr two  mr-2" data-col="6"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider-full-1"></div>

            <div class="category-frop">
                <div class="category-list">
                    <div class="widget-wrap">
                        <h2 class="widget-title"> <span class="light-font">Refine by</span> <strong>category</strong> </h2>
                        <div class="divider-full-1"></div>
                        <div class="tabs-box">
                            <ul class="theme-tabs" id="categories">
                                <div class="container-fluid">
                                    <div class="col-md-12">
                                        <div class="tab-content organic-content row width-fly">
                                            <div class="product-slider-1 dots-1">
                                             
                                                @foreach ($productCategory as $category)
                                                    <li class="hish collapsible"><a href="#" data-toggle="tab"
                                                            class="category-btn"
                                                            data-id="{{ $category->id }}">{{ $category->name }}</a></li>
                                                           
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>

                        </div>
                        <ul class="checkbox-widget">
                            @foreach ($productCategory as $category)
                                <ul class="checkbox-widget">
                                    <li class="form-group collapsible">
                                        
                                        <label class="checkbox-inline ">
                                            <input value="{{ $category->id }}" type="checkbox" class="category-checkbox ">
                                            <span>{{ $category->name }}</span>
                                           
                                        </label>
                                        {{-- <i class="fa fa-angle-down arrow-category " aria-hidden="true"></i> --}}
                                        
                                    </li>
                                    {{-- <li class="form-group content">
                                        
                                        <label class="checkbox-inline ">
                                            <input value="{{ $category->id }}" type="checkbox" class="category-checkbox ">
                                            <span>{{ $category->name }}</span>
                                           
                                        </label>
                                        
                                        
                                    </li> --}}
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="product-list">
                    <div class="grid-parent right">
                        <div class="grid-2">
                            <a href="" class="active" data-col="2">
                                <i class="fa fa-square" aria-hidden="true"></i>
                                <span><i class="fa fa-square" aria-hidden="true"></i>
                                    <i class="fa fa-square" aria-hidden="true"></i>
                                    <i class="fa fa-square" aria-hidden="true"></i>
                                    <i class="fa fa-square" aria-hidden="true"></i>
                                    <i class="fa fa-square" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                        <div class="grid-3">
                            <a href="" data-col="3">
                                <i class="fa fa-square" aria-hidden="true"></i>
                                <span><i class="fa fa-square" aria-hidden="true"></i>
                                    <i class="fa fa-square" aria-hidden="true"></i>
                                    <i class="fa fa-square" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                        <div class="grid-4">
                            <a href="" data-col="4">
                                <i class="fa fa-square" aria-hidden="true"></i>
                                <span><i class="fa fa-square" aria-hidden="true"></i>
                                    <i class="fa fa-square" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                        <div class="grid-6">
                            <a href="" data-col="6">
                                <i class="fa fa-square" aria-hidden="true"></i>
                                <span><i class="fa fa-square" aria-hidden="true"></i>
                                    
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="tab-content shop-content">
                        <div class="products-content grid tab-pane fade active in " role="tabpanel">
                            <div class="row productShopCards">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="rel-div pt-50">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- / Shop Ends -->

    <!-- / CONTENT AREA -->

    <!-- / Shop Ends -->
@endsection

@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        var productArray = [];
        $(document).ready(function() {
            // Function to fetch and display products
            function fetchAndDisplayProducts(id) {
                $.ajax({
                    url: '/products/filter/' + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        products = data.products;
                        productArray = products;
                        displayProductCards(data.products);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Display products for the default category on page load
            $(document).ready(function() {
                // Replace 'defaultCategory' with your actual default category
                const defaultCategory = '1';

                fetchAndDisplayProducts(defaultCategory);

                // Set up click event for category checkboxes
                $('.category-checkbox').on('click', function() {
                    const clickedCheckbox = $(this);
                    
                    // Uncheck all other checkboxes except the clicked one
                    $('.category-checkbox').not(clickedCheckbox).prop('checked', false);
                    
                    // Fetch and display products for the selected category
                    if (clickedCheckbox.prop('checked')) {
                        const selectedCategory = clickedCheckbox.val();
                        fetchAndDisplayProducts(selectedCategory);
                    }
                });

                // Set up click event for "Add to Cart" buttons
                $('.productShopCards').on('click', '.add-to-cart-btn', function() {
                    const productId = $(this).data('product-id');
                    addToCart(productId);
                });

                // Set up click event for "View Details" buttons
                $('.productShopCards').on('click', '.view-details-btn', function() {
                    const productId = $(this).data('product-id');
                    fetchProductDetails(productId);
                });
            });

            // Assuming your search button has the class "btn" and the input has the class "form-control"
            $(".sort-dropdown .btn").on("click", function() {
                console.log(products);
                // Get the search input value
                let searchInput = $(".sort-dropdown .form-control").val().toLowerCase();

                // Filter products based on the search input
                let filteredProducts = products.filter(function(product) {
                    return product.title.toLowerCase().includes(searchInput);
                });

                // Display the filtered products
                displayProductCards(filteredProducts);
            });
            // Assuming your select dropdown has the class "input-price"
            $(".input-price").on("change", function() {
                // Get the selected sort option
                let selectedSort = $(this).val();

                // Sort the products based on the selected option
                let sortedProducts = sortProducts(products, selectedSort);

                // Display the sorted products
                displayProductCards(sortedProducts);
            });
            // Assuming your select dropdown has the class "input-price"
            $(".input-price").on("change", function() {
                // Get the selected price option
                let selectedPrice = $(this).val();

                // Filter the products based on the selected option
                let filteredProducts = filterProductsByPrice(products, selectedPrice);

                // Display the filtered products
                displayProductCards(filteredProducts);
            });
            // Function to filter products based on the selected price option
            function filterProductsByPrice(products, selectedPrice) {
                if (selectedPrice === "Low to High") {
                    // Filter products in ascending order by price
                    return products.sort((a, b) => a.product_variants[0].sale_price - b.product_variants[0]
                        .sale_price);
                } else if (selectedPrice === "High to Low") {
                    // Filter products in descending order by price
                    return products.sort((a, b) => b.product_variants[0].sale_price - a.product_variants[0]
                        .sale_price);
                } else {
                    // Default filtering (no filtering)
                    return products;
                }
            }
            // Function to sort products based on the selected option
            function sortProducts(products, selectedSort) {
                if (selectedSort === "A - Z") {
                    // Sort products in ascending order by title
                    return products.sort((a, b) => a.title.localeCompare(b.title));
                } else if (selectedSort === "Z - A") {
                    // Sort products in descending order by title
                    return products.sort((a, b) => b.title.localeCompare(a.title));
                } else {
                    // Default sorting (no sorting)
                    return products;
                }
            }
            var productDetailsRoute = "{{ route('productDetails', ['category' => ':category','product' => ':product']) }}";
            function displayProductCards(products, columns=3) {
                let productsContainer = $(".productShopCards");
                productsContainer.empty(); // Clear previous products
                // Loop through the products and generate HTML for each product card
                $.each(products, function(index, product) {
                    var productId = product.id;
                    var categoryName = product.product_category.slug;
                    var slug = product.slug;
                    // Create a new 'a' (anchor) element
                    var linkElement = document.createElement("a");

                    // Set the 'href' attribute using the template string
                    linkElement.href = productDetailsRoute.replace(':category', encodeURIComponent(categoryName))
                    .replace(':product', encodeURIComponent(slug));
                    let productCard = `
                    <div class="col-lg-${columns} col-md-${columns + 1} col-sm-${columns + 3}"> 
                                    <div class="product-box"> 
                                        <div class="product-media" style="background-color: ${product.product_category.color_code} !important; background-image: url({{ asset('web-assets/images/banner/text.png') }})"> 
                                            <a href="${linkElement}">
                                                    <img class="prod-img drift-demo-trigger " data-zoom="{{ asset('images/product-images/${product.photo}') }}" src="{{ asset('images/product-images/${product.photo}') }}" alt=""/>     
                                            </a>  
                                            <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                            <div class="prod-icons"> 
                                                @if (Auth::user())
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

            // Function to handle click event on layout change buttons
            $(".grid-2 a, .grid-3 a, .grid-4 a, .grid-6 a").on("click", function(e) {
                e.preventDefault();

                // Remove active class from all buttons
                $(".grid-2 a, .grid-3 a, .grid-4 a, .grid-6 a").removeClass("active");

                // Add active class to the clicked button
                $(this).addClass("active");

                let columns = parseInt($(this).attr("data-col"));
                displayProductCards(productArray, columns);
            });

            function fetchProductDetails(productId) {
                // Assuming you have an API endpoint to fetch product details
                $.ajax({
                    url: '/api/getProductById/' + productId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        displayProductDetails(data);
                    },
                    error: function(error) {
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
                                        <img id="imgZoom" onmousemove="zoomIn(event)" onmouseout="zoomOut()"  src="{{ asset('images/product-images/${product.photo}') }}" data-image="${product.photo}" width="300" alt=""/>
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
                                                                            <span class="weight-option" data-variant="${variant.id}" data-price="${variant.sale_price}"><a href="javascript: void(0)">${variant.weight} </a></span>
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
                $('#product-preview').on('click', '.add-to-cart-btn', function() {
                    var productId = $(this).data('product-id');
                    var quantity = document.getElementById('quatity').value;
                    var variant_id = variantId;
                    array = [{
                        'product_id': parseInt(productId),
                        'quantity': parseInt(quantity),
                        'variant_id': parseInt(variant_id),
                    }];
                    addToCart(array);
                });
                // $('.modal-open').on('click', '.add-to-cart-btn', function() {
                //     // console.log(123)
                //     var productId = $(this).data('product-id');
                //     var quantity = document.getElementById('quatity').value;
                //     var variant_id = variantId;
                //     array = [{
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
                    url: '{{ route('cart.store') }}',
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
                    success: function(response) {
                        $('#product-preview').hide();
                        location.reload();
                        openCart();
                    },
                    error: function(error) {
                        console.error('Error adding to cart:', error);
                    }
                });
            }


            $(document).ready(function() {
                openCart(); // Call openCart when the document is ready
            });

        });
        var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
    </script>
@endsection
