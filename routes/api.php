<?php

use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\GeneralController;
use App\Http\Controllers\API\PaymentMethodController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\HomeSliderController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderStatusController;
use App\Http\Controllers\API\ProductFlavourController;
use App\Http\Controllers\API\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//***********************************************************************************
//***************************General Controller Routes*******************************
//***********************************************************************************
// Get All Permissions
Route::get('/getAllPermissions', [GeneralController::class, 'getAllPermissions']);
// Get All Roles
Route::get('/getAllRoles', [GeneralController::class, 'getAllRoles']);
// Get Settings Data
Route::get('/getSetting', [GeneralController::class, 'getSetting']);
// Get Categories
Route::get('/getCategories', [GeneralController::class, 'getCategories']);
// Get Product Flavours
Route::get('/getProductFlavours', [GeneralController::class, 'getProductFlavours']);
// Get Brands
Route::get('/getBrands', [GeneralController::class, 'getBrands']);
// Get All ParentCategories
Route::get('/getAllParentCategories', [GeneralController::class, 'getAllParentCategories']);
// Get Child Categories
Route::get('/getChildCategories', [GeneralController::class, 'getChildCategories']);
// Get All Products
Route::get('/getAllProducts', [GeneralController::class, 'getAllProducts']);
// Get All Payment Methods
Route::get('/getAllPaymentMethods', [GeneralController::class, 'getAllPaymentMethods']);
// Get All Child Categories
Route::get('/getAllChildCategories', [GeneralController::class, 'getAllChildCategories']);
// Get All Customers
Route::get('/getAllCustomers', [GeneralController::class, 'getAllCustomers']);
// Get All Statuses
Route::get('/getAllOrderStatus', [GeneralController::class, 'getAllOrderStatus']);
// Get Product By Id
Route::get('/getProductById/{id}', [GeneralController::class, 'getProductById']);


// All Sanctum Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //***********************************************************************************
    //**********************************Resource Routes**********************************
    //***********************************************************************************
    Route::apiResources(['users' => UserController::class]);
    Route::apiResources(['productFlavours' => ProductFlavourController::class]);
    Route::apiResources(['roles' => RoleController::class]);
    Route::apiResources(['permissions' => PermissionController::class]);
    Route::apiResources(['settings' => SettingController::class]);
    Route::apiResources(['profiles' => ProfileController::class]);
    Route::apiResources(['productCategories' => ProductCategoryController::class]);
    Route::apiResources(['products' => ProductController::class]);
    Route::apiResources(['paymentMethods' => PaymentMethodController::class]);
    Route::apiResources(['orders' => OrderController::class]);
    Route::apiResources(['brands' => BrandController::class]);
    Route::apiResources(['homeSliders' => HomeSliderController::class]);
    Route::apiResources(['orderStatus' => OrderStatusController::class]);
    Route::apiResources(['cities' => CityController::class]);
    //Delete Product Images
    Route::delete('/removeProductImages/{id}', [ProductController::class, 'removeProductImages']);
    //Delete Product Variants
    Route::delete('/removeProductVariants/{id}', [ProductController::class, 'removeProductVariants']);
    
    //Delete Order Detail
    Route::delete('/removeOrderDetail/{id}', [OrderController::class, 'removeOrderDetail']);
    //***********************************************************************************
    //***************************** Dashboard Screen Routes *****************************
    //***********************************************************************************
    Route::get('/getLatestOrders', [DashboardController::class, 'getLatestOrders']);
    //Update Order Status
    Route::post('/updateOrderStatus/{id}', [OrderController::class, 'updateOrderStatus']);

    //***********************************************************************************
    //******************************Report Controller Routes*****************************
    //***********************************************************************************
    // Customer Report
    Route::get('/customerReport', [ReportController::class, 'customerReport']);
    // Orders Report
    Route::get('/ordersReport', [ReportController::class, 'ordersReport']);
    // Order Detail Report
    Route::get('/orderDetailReport', [ReportController::class, 'orderDetailReport']);
    // Stock Report
    Route::get('/stockReport', [ReportController::class, 'stockReport']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
