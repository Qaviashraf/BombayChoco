<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
        SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
        $currentUrl = url()->current();
        SEOMeta::setCanonical($currentUrl);
        
        $productCategory = ProductCategory::with('parentCategory')->get();
        return view('web.shop-1')->with('productCategory',$productCategory);
        
    }

    public function productDetails($categorySlug,$productSlug)
    {
        $category = ProductCategory::where('slug', $categorySlug)->firstOrFail();
        $data = Product::where('is_disabled',0)->where('slug', $productSlug)->where('product_category_id', $category->id)
        ->with('productImages')
        ->firstOrFail();
        
        SEOMeta::setTitle($data->meta_title);
        SEOMeta::setDescription($data->meta_description);
        $currentUrl = url()->current();
        SEOMeta::setCanonical($currentUrl);

        return view('web.shop-single-rightsidebar',compact('data'));
    }
}
