<?php

use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ShopController;
use App\Http\Controllers\Web\SpecialOfferController;
use App\Http\Controllers\Web\TrackOrderController;
use App\Http\Controllers\Web\WishlistController;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Home Page
Route::get('/', [HomeController::class, 'index']);
Route::get('/specialoffers', [SpecialOfferController::class, 'index'])->name('specialoffers');
Route::get('/products/filter/{category}', [HomeController::class, 'filterByCategory']);
Route::get('/searchByProduct', [HomeController::class, 'searchByProduct'])->name('searchByProduct');
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
    Route::get('/products/{category}', [CategoryController::class, 'getCategoryByProduct'])->name('getCategoryByProduct');
Route::get('/fetchDataFromApi', [HomeController::class, 'fetchDataFromApi']);

Route::get('/404', function () {
    return view('web.404');
});
Route::get('/about-us', function () {
    SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
    SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
    $currentUrl = url()->current();
    SEOMeta::setCanonical($currentUrl);
    return view('web.about-us');
});
Route::get('/account-information', function () {
    return view('web.account-information');
});
Route::get('/address-book', function () {
    return view('web.address-book');
});
Route::get('/blog-rightsidebar', function () {
    return view('web.blog-rightsidebar');
});
Route::get('/blog-single-fullwidth', function () {
    return view('web.blog-single-fullwidth');
});
Route::get('/blog-single-rightsidebar', function () {
    return view('web.blog-single-rightsidebar');
});
Route::get('/blog-single', function () {
    return view('web.blog-single');
});
Route::get('/blog', function () {
    return view('web.blog');
});
// Route::get('/checkout', function () {
//     return view('web.checkout');
// });
Route::get('/cng-pw', function () {
    return view('web.cng-pw');
});
Route::get('/coming-soon', function () {
    return view('web.coming-soon');
});
Route::get('/contact', function () {
    
    SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
    SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
    $currentUrl = url()->current();
    SEOMeta::setCanonical($currentUrl);

    return view('web.contact');
});
Route::get('/forgot-password', function () {
    return view('web.forgot-password');
});
Route::get('/web/login', function () {
    return view('web.login');
});

Route::get('/myaccount-leftsidebar', function () {
    return view('web.myaccount-leftsidebar');
});
Route::get('/newsletter', function () {
    return view('web.newsletter');
});
// Route::get('/order-history', function () {
//     return view('web.order-history');
// });
Route::get('/return', function () {
    return view('web.return');
});
Route::get('/review-rating', function () {
    return view('web.review-rating');
});
// Route::get('/shop-1', function () {
//     return view('web.shop-1');
// });
Route::get('/shop-2', function () {
    return view('web.shop-2');
});
Route::get('/shop-rightsidebar-2', function () {
    return view('web.shop-rightsidebar-2');
});
Route::get('/shop-single-fullwidth', function () {
    return view('web.shop-single-fullwidth');
});

Route::get('/shop-single', function () {
    return view('web.shop-single');
});
Route::get('/giftbundle', function () {
    
    SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
    SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
    $currentUrl = url()->current();
    SEOMeta::setCanonical($currentUrl);

    return view('web.giftbundle');
});
// Route::get('/specialoffers', function () {
//     return view('web.specialoffers');
// });
Route::get('/thankyou', function () {
    return view('web.thankyou');
});
// Route::get('/tracking', function () {
//     return view('web.tracking');
// });
Route::get('/wishlist', function () {
    return view('web.wishlist');
});

Route::get('/my-account', function () {
    return view('web.my-account');
});

// Route::get('/wishlist-product', function () {
//     return view('web.wishlist-product');
// });
Route::get('/shopbybrands', function () {
    return view('web.shopbybrands');
});
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('/orders/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/trackOrders', [TrackOrderController::class, 'index'])->name('trackOrders');
Route::get('/getTrackOrder', [TrackOrderController::class, 'getTrackOrder'])->name('getTrackOrder');
Route::post('/web/login', [UserAuthController::class, 'login'])->name('web.login');
Route::post('/my-account/update', [UserAuthController::class, 'updateAccount'])->name('update.account');
Route::post('/custom-register', [UserAuthController::class, 'customerRegister'])->name('custom.register');
Route::post('/update-password', [UserAuthController::class, 'updatePassword'])->name('update.password');
Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('order.history');
Route::get('/wishlist-product', [WishlistController::class, 'index'])->name('wishlist.product');
Route::post('/wishlist-product/store', [WishlistController::class, 'store'])->name('wishlist.store');
Route::get('/{category}/{product}', [ShopController::class, 'productDetails'])->name('productDetails');
Auth::routes(['verify' => true, 'register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('language/{locale}', function ($locale) {
    \Session::put('locale', $locale);
    return redirect()->back();
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/email', [App\Http\Controllers\HomeController::class, 'email'])->name('email');
Route::get('{path}', [App\Http\Controllers\HomeController::class, 'index'])->where('path', '([A-z\d\-\/_.]+)?');

