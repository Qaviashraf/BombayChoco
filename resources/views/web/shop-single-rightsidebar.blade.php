@extends('web.master')
@section('content')
<style>
    .main-btn {
        display: flex;
        justify-content: space-between;
    }
    .add-cart.pt-15 a.theme-btn.js-add-product.buy-now {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
    <!-- Shop Starts-->
    <section class="shop-wrap sec-space-bottom">
        <div class="container rel-div pt-50">
            <div class="row">
                <div class="col-md-1 pt-15">
                </div>
                <div class="col-md-10 pt-15">
                    <div class="product-single sec-space-bottom  clearfix">
                        <!-- Single Products Slider Starts -->
                        <div class="col-lg-6 pb-50 col-sm-8 col-sm-offset-2 col-lg-offset-0">
                            <div class="prod-slider sync1">
                                <div class="item">
                                    <img id="imgZoom" onmousemove="zoomIn(event)" onmouseout="zoomOut()" src="{{asset('images/product-images/'.$data->photo)}}" width="400" alt="">
                                    <div id="overlay" onmousemove="zoomIn(event)"></div>
                                </div>
                                @foreach ($data->productImages as $productImage)
                                <div class="item">
                                    <img id="imgZoom" onmousemove="zoomIn(event)" onmouseout="zoomOut()" src="{{asset('images/product-images/'.$productImage->image)}}" width="400" alt="">
                                    <div id="overlay" onmousemove="zoomIn(event)"></div>
                                </div>
                                @endforeach
                            </div>

                            <div class="sync2">
                                <div class="item"> <a href="/#"> <img src="{{asset('images/product-images/'.$data->photo)}}"
                                    alt=""> </a> </div>
                                @foreach ($data->productImages as $productImage)
                                <div class="item"> <a href="/#"> <img src="{{asset('images/product-images/'.$productImage->image)}}"
                                alt=""> </a> </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Single Products Slider Ends -->

                        <div class="col-lg-6">
                            <div class="product-content block-inline">
                                <div class="tag-rate">
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="rating">
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="fsz-12 gray-color ml-10"> Based on 25 reviews</span>
                                    </div>
                                </div>
                                
                                <div class="single-caption">
                                    <h3 class="section-title">
                                        <strong>{{ $data->title }}</strong>
                                    </h3>
                                    <span class="divider-2"></span>
                                    <p class="price">
                                        <strong class="clr-txt fsz-20 saleprice"></strong>
                                    </p>

                                    <div class="fsz-16">
                                        <p> {!! $data->one_line_description !!} </p>
                                    </div>

                                    <div class="prod-btns">
                                        <div class="quantity">
                                            <input title="Qty" id="quatity" value="1" name="quantity"
                                                min="1" class="form-control" type="number">
                                        </div>
                                    </div>
                                    @if ($data->stock == 0)
                                        <button type="button" class="btn btn-success">In Stock</button>
                                    @else
                                        <button type="button" class="btn btn-danger">Out Of Stock</button>
                                    @endif
                                    <ul class="meta">
                                        <li class="tags-widget" id="variantsContainer">
                                            <strong>Variants</strong>: &nbsp;
                                            @foreach ($data->productVariants as $variant)
                                                <span class="weight-option" data-variant="{{ $variant->id }}"
                                                    data-price="{{ $variant->sale_price }}">
                                                    <a href="javascript:void(0);">{{ $variant->weight }}</a>
                                                </span>
                                            @endforeach
                                        </li>
                                        <li>
                                            <strong>CATEGORY</strong><span>: &nbsp;
                                                {{ $data->productCategory->name }}</span>
                                        </li>
                                        <li class="tags-widget"> <strong> TAGS </strong> <span>: &nbsp; <a
                                                    href="/#">fruits</a> <a href="/#">vegetables</a> <a
                                                    href="/#">juices</a></span> </li>
                                    </ul>
                                    <div class="divider-full-1"></div>
                                    <div class="add-cart pt-15">
                                        @if ($data->stock == 0)
                                            <a href="javascript:void(0);" class="theme-btn js-add-product  add-to-cart-btn"
                                            data-product-id="{{ $data->id }}"> <strong> ADD TO CART </strong> </a>
                                            <a href="javascript:void(0);" class="theme-btn js-add-product buying buy-now final"data-product-id="{{ $data->id }}">
                                            <strong> BUY NOW </strong> </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="fsz-16"><span class="light-font">customers </span> <strong>reviews </strong> <span
                            class="clr-txt">(3)</span> </h3>
                    <span class="divider-2 crl-bg"></span>

                    <div class="review-wrap">
                        <div class="review-img">
                            <a href="/#"> <img alt="" src="{{asset('assets/img/extra/review-1.png')}}" /> </a>
                        </div>
                        <div class="review-caption">
                            <h4 class="title fsz-16">
                                <a href="/#">Luis Nazario Garcia</a>
                                <span class="fsz-10 gray-color">26 JUNE 2016</span>
                            </h4>
                            <div class="rating">
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="fsz-12 gray-color"> Rating : 5/5 </span>
                            </div>

                            <div class="block-inline pera">
                                <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat adiping elit food sed diam
                                    nonummy nibh euismod tincidunt ut laoreet dolore. </p>
                            </div>
                        </div>
                    </div>

                    <div class="review-wrap">
                        <div class="review-img">
                            <a href="/#"> <img alt="" src="{{asset('assets/img/extra/review-1.png')}}" /> </a>
                        </div>
                        <div class="review-caption">
                            <h4 class="title fsz-16">
                                <a href="/#">Luis Nazario Garcia</a>
                                <span class="fsz-10 gray-color">26 JUNE 2016</span>
                            </h4>
                            <div class="rating">
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="fsz-12 gray-color"> Rating : 5/5 </span>
                            </div>

                            <div class="block-inline pera">
                                <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat adiping elit food sed diam
                                    nonummy nibh euismod tincidunt ut laoreet dolore. </p>
                            </div>
                        </div>
                    </div>

                    <div class="review-wrap">
                        <div class="review-img">
                            <a href="/#"> <img alt="" src="{{asset('assets/img/extra/review-1.png')}}" /> </a>
                        </div>
                        <div class="review-caption">
                            <h4 class="title fsz-16">
                                <a href="/#">Luis Nazario Garcia</a>
                                <span class="fsz-10 gray-color">26 JUNE 2016</span>
                            </h4>
                            <div class="rating">
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="star active"></span>
                                <span class="fsz-12 gray-color"> Rating : 5/5 </span>
                            </div>

                            <div class="block-inline pera">
                                <p>Lorem ipsum dolor sit amet, consectetuer adiping elit food sed diam nonummy nibh euismod
                                    tincidunt ut laoreet dolore magna aliquam erat volutpat adiping elit food sed diam
                                    nonummy nibh euismod tincidunt ut laoreet dolore. </p>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper main-int">
                        <input type="radio" name="tab" id="tab-1" checked>
                        <label class="tabs" for="tab-1">Description</label>
                        {{-- <input type="radio" name="tab" id="tab-2">
                        <label for="tab-2">Item Size</label> --}}
                        <input type="radio" name="tab" id="tab-3">
                        <label class="tabs"  for="tab-3">More Info</label>
                        <input type="radio" name="tab" id="tab-4">
                        <label class="tabs"  for="tab-4">Faq</label>


                        <div class="content">
                            <article class="tab-1">
                                {!! $data->description !!}

                            </article>
                            {{-- <article class="tab-2">
                                <section class="performance-facts">
                                    <header class="performance-facts__header">
                                        <h3 style="margin: 0px;">Enthält von Natur aus Fruchtzucker &amp; Kalorien</h3>
                                    </header>

                                    <div class="vorteilspackungdiv">
                                        <span class="vorteilspackung">Nährwerte für 100g</span>
                                    </div>
                                    <table class="performance-facts__table">

                                        <tbody>

                                            <tr class="cart_item">
                                                <td class="total">
                                                    Energie
                                                </td>
                                                <td>
                                                    323 kcal/1352 kJ
                                                </td>
                                            </tr>


                                            <tr class="cart_item">
                                                <td class="total">
                                                    Fett
                                                </td>
                                                <td>
                                                    2,4 g
                                                </td>
                                            </tr>


                                            <tr class="cart_item">
                                                <td class="total">
                                                    davon ges. Fettsäuren
                                                </td>
                                                <td>
                                                    0,5 g
                                                </td>
                                            </tr>


                                            <tr class="cart_item">
                                                <td class="total">
                                                    Kohlenhydrate
                                                </td>
                                                <td>
                                                    67,1 g
                                                </td>
                                            </tr>


                                            <tr class="cart_item">
                                                <td class="total">
                                                    davon Zucker*
                                                </td>
                                                <td>
                                                    67,1 g
                                                </td>
                                            </tr>


                                            <tr class="cart_item">
                                                <td class="total">
                                                    Ballaststoffe
                                                </td>
                                                <td>
                                                    9,2 g
                                                </td>
                                            </tr>


                                            <tr class="cart_item">
                                                <td class="total">
                                                    Eiweiß
                                                </td>
                                                <td>
                                                    3,2 g
                                                </td>
                                            </tr>


                                            <tr class="cart_item">
                                                <td class="total">
                                                    Salz
                                                </td>
                                                <td>
                                                    0,07 g
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div style="border-top: 1px solid #e2e2e2;">
                                        <div class="nahrwertinfo">

                                            <p class="small-info">- 100% Mango</p>


                                            <p class="small-info">- Herkunftsland: Ghana, Peru und Mexico</p>


                                            <p class="small-info">- Kühl (10-15 Grad), luftdicht verschlossen und trocken
                                                aufbewahren.</p>


                                            <p class="small-info">- Keine Allergene enthalten gemäß EU-Verordnung
                                                1169/2011.</p>


                                            <p class="small-info">* Fruchtzucker</p>


                                            <p class="small-info">** Alle Angaben ohne Gewähr.</p>


                                        </div>
                                    </div>

                                </section>
                            </article> --}}
                            <article class="tab-3">
                                {!! $data->more_info !!}
                            </article>
                            <article class="tab-4">
                                <div class="accordion">
                                    <h1>Frequently Asked Questions</h1>
                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion1">
                                        <label for="accordion1" class="accordion-item-title"><span
                                                class="icon"></span>What is SEO, and why is it important for online
                                            businesses?</label>
                                        <div class="accordion-item-desc">SEO, or Search Engine Optimization, is the
                                            practice of optimizing a website to improve its visibility on search engines
                                            like Google. It involves various techniques to enhance a site's ranking in
                                            search results. SEO is crucial for online businesses as it helps drive organic
                                            traffic, increases visibility, and ultimately leads to higher conversions.</div>
                                    </div>

                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion2">
                                        <label for="accordion2" class="accordion-item-title"><span
                                                class="icon"></span>How long does it take to see results from SEO
                                            efforts?</label>
                                        <div class="accordion-item-desc">The timeline for seeing results from SEO can vary
                                            based on several factors, such as the competitiveness of keywords, the current
                                            state of the website, and the effectiveness of the SEO strategy. Generally, it
                                            may take several weeks to months before noticeable improvements occur. However,
                                            long-term commitment to SEO is essential for sustained success.</div>
                                    </div>

                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion3">
                                        <label for="accordion3" class="accordion-item-title"><span
                                                class="icon"></span>What are the key components of a successful SEO
                                            strategy?</label>
                                        <div class="accordion-item-desc">A successful SEO strategy involves various
                                            components, including keyword research, on-page optimization, quality content
                                            creation, link building, technical SEO, and user experience optimization. These
                                            elements work together to improve a website's relevance and authority in the
                                            eyes of search engines.</div>
                                    </div>

                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion4">
                                        <label for="accordion4" class="accordion-item-title"><span
                                                class="icon"></span>How does mobile optimization impact SEO?</label>
                                        <div class="accordion-item-desc">Mobile optimization is crucial for SEO because
                                            search engines prioritize mobile-friendly websites. With the increasing use of
                                            smartphones, search engines like Google consider mobile responsiveness as a
                                            ranking factor. Websites that provide a seamless experience on mobile devices
                                            are more likely to rank higher in search results.</div>
                                    </div>

                                    <div class="accordion-item">
                                        <input type="checkbox" id="accordion5">
                                        <label for="accordion5" class="accordion-item-title"><span
                                                class="icon"></span>What is the role of backlinks in SEO, and how can
                                            they be acquired?</label>
                                        <div class="accordion-item-desc">Backlinks, or inbound links from other websites to
                                            yours, play a significant role in SEO. They are considered a vote of confidence
                                            and can improve a site's authority. Quality over quantity is crucial when
                                            acquiring backlinks. Strategies for obtaining backlinks include creating
                                            high-quality content, guest posting, reaching out to industry influencers, and
                                            participating in community activities. It's important to focus on natural and
                                            ethical link-building practices.</div>
                                    </div>

                                </div>
                            </article>

                        </div>
                        <br class="clear:both" />
                    </div>
                    <div class="you-like organic-content pb-50">
                        <h3 class="fsz-20 pb-15 text-center"><span class="light-font">Related </span> <strong>Products
                            </strong> </h3>
                        <div class="divider-full-1"></div>
                        <div class="tab-pane fade active in productShopCards giftbundles" role="tabpanel">
                            <!-- Larger screen-specific content goes here -->
                        </div>
                    </div>
                    <div class="divider-full-1"></div>
                    <div class="your-review mt-5">
                        <h3 class="fsz-20 pb-15 text-center"><span class="light-font">Your item </span> <strong>review
                            </strong> </h3>
                        <div class="divider-full-1"></div>
                        <div class="your-review">
                            <div class="block-inline your-rating">
                                <div class="left">
                                    <div class="rating">
                                        <span class="fsz-12 gray-color"> Your Rating : </span>
                                        <span class="star"></span>
                                        <span class="star"></span>
                                        <span class="star"></span>
                                        <span class="star"></span>
                                        <span class="star"></span>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="rating">
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="star active"></span>
                                        <span class="fsz-12 gray-color"> Overall Rating : 5/5 </span>
                                    </div>
                                </div>
                            </div>
    
                            <form class="review-form row">
                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Name" required="" type="text">
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Email" required="" type="email">
                                </div>
                                <div class="form-group col-sm-4">
                                    <input class="form-control" placeholder="Website" type="text">
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control" placeholder="Message" cols="12" rows="4"></textarea>
                                </div>
                                <div class="form-group col-sm-12 text-center ptb-15">
                                    <button class="theme-btn" type="submit"> <strong> SUBMIT REVIEW </strong> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 pt-15">
                </div>
            </div>
        </div>
    </section>
    <section class="subscribe-wrap sec-space light-bg">
        <img alt="" src="assets/img/extra/sec-img-5.png" class="right-bg-img" />
        <!-- <img src="{{ asset('web-assets/images/product/chocolate.png') }}"  class="leftphp-bg-img" alt=""> -->
        <h4 class="sub-title"> JOIN OUR NEWSLETTER </h4>
        <h2 class="fsz-35"> <span class="light-font">subscribe </span> <strong> newsletter</strong> </h2>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
    
                </div>
                <div class="col-md-8">
                    <form class="newsletter-form row">
                        <div class="form-group col-sm-8">
                            <input class="form-control" placeholder="enter your email address" required=""
                                type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <button class="theme-btn btn-block" type="submit"> subscribe <i
                                    class="fa fa-long-arrow-right"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- / Shop Ends -->
@endsection
@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function() {
        // Initialize the price with the default value
        var defaultPrice = {!! $data->productVariants->first()->sale_price !!};
        var variantId = {!! $data->productVariants->first()->id !!};
        var category_id = {!! $data->product_category_id !!};
        fetchAndDisplayProducts(category_id);
        updatePrice(defaultPrice);

        // Handle variant click
        $('.weight-option a').on('click', function() {
            var variantPrice = $(this).parent().data('price');
            variantId = $(this).data('variant');
            updatePrice(variantPrice);
        });
        // Handle variant click
        $('.weight-option').on('click', function() {
            variantId = $(this).data('variant');
        });

        // Function to update the displayed price
        function updatePrice(price) {
            $('.saleprice').text('Rs' + price);
        }

        // Set up click event for "Add to Cart" buttons
        $('.single-caption').on('click', '.add-to-cart-btn', function() {
            var productId = $(this).data('product-id');
            var quantity = document.getElementById('quatity').value;
            var variant_id = variantId;
            array = [{
                'product_id': parseInt(productId),
                'quantity': parseInt(quantity),
                'variant_id': parseInt(variant_id),
            }];
            addToCart(array,null);
        });

        // Set up click event for "Add to Cart" buttons
        $('.single-caption').on('click', '.buy-now', function() {
            var productId = $(this).data('product-id');
            var quantity = document.getElementById('quatity').value;
            var variant_id = variantId;
            array = [{
                'product_id': parseInt(productId),
                'quantity': parseInt(quantity),
                'variant_id': parseInt(variant_id),
            }];
            addToCart(array,'buy-now');
        });


        function addToCart(data,buy) {
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
                    // Redirect to another page
                    if (buy === null) {
                        location.reload();
                    }else{
                        window.location.href = "{{ route('checkout') }}";
                    }
                    openCart();
                },
                error: function(error) {
                    console.error('Error adding to cart:', error);
                }
            });

        }
        /////
        // Function to fetch and display products
        function fetchAndDisplayProducts(id) {
            $.ajax({
                url: '/products/filter/' + id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    displayProductCards(data.products);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Set up click event for "View Details" buttons
        $('.productShopCards').on('click', '.view-details-btn', function() {
            const productId = $(this).data('product-id');
            fetchProductDetails(productId);
        });
        var productDetailsRoute = "{{ route('productDetails', ['category' => ':category','product' => ':product']) }}";
        function displayProductCards(products) {
            let productsContainer = $(".productShopCards");
            productsContainer.empty(); // Clear previous products
            // Loop through the products and generate HTML for each product card
            $.each(products.slice(1, 4), function(index, product) {
                var productId = product.id;
                var categoryName = product.product_category.slug;
                var slug = product.slug;
                // Create a new 'a' (anchor) element
                var linkElement = document.createElement("a");

                // Set the 'href' attribute using the template string
                linkElement.href = productDetailsRoute.replace(':category', encodeURIComponent(categoryName))
                .replace(':product', encodeURIComponent(slug));
                let productCard = `
                <div class="col-lg-4 col-md-4 col-sm-6"> 
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
                        </div>`;
                // Append the product card HTML to the products container
                productsContainer.append(productCard);

                // Break out of the loop after processing 5 products
                if (index === 13) {
                    return false;
                }
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

                                    <div class="tag-rate">
                                        <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    </div>

                                    <div class="single-caption"> 
                                        <h3 class="section-title">
                                            <a href="javascript:void(0);"><strong>${product.title}</strong></a>
                                        </h3>
                                        <span class="divider-2"></span>
                                        <p class="price"> 
                                            <strong class="clr-txt fsz-20 saleprices"></strong>
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
                                                                <span class="weight-options" data-variant="${variant.id}" data-price="${variant.sale_price}"><a href="javascript:void(0);">${variant.weight} </a></span>
                                                            `).join('')}
                                            </li>
                                            <li> <strong>CATEGORY:</strong><span> ${product.product_category.name}</span> </li>
                                        </ul>
                                        <div class="divider-full-1"></div>
                                        <div class="add-cart pt-15">
                                            <a href="javascript:void(0);" class="theme-btn js-add-product  add-to-cart-btns" data-product-id="${product.id}"> <strong> ADD TO CART </strong> </a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>  
                    </div>
                    </div>
                </div>`);

            // Set the default price to be the price of the first variant
            const defaultPrices = product.product_variants[0].sale_price;
            updatePrices(defaultPrices);

            // Function to update the displayed price
            function updatePrices(newPrice) {
                $('.saleprices').text('Rs' + newPrice);
            }
            var variantIds = product.product_variants[0].id;
            // Add event listener to the weight options
            $('.weight-options').on('click', function() {
                const selectedWeight = $(this).data('price');
                variantIds = $(this).data('variant');
                updatePrices(selectedWeight);
            });

             // Set up click event for "Add to Cart" buttons
        $('#product-preview').on('click', '.add-to-cart-btns', function() {
                var productId = $(this).data('product-id');
                var quantity = document.getElementById('quatity').value;
                var variant_ids = variantIds;
                array = [{
                    'product_id': parseInt(productId),
                    'quantity': parseInt(quantity),
                    'variant_id': parseInt(variant_ids),
                }];
                addToCart(array,null);
        });
        }
       
    });
</script>
