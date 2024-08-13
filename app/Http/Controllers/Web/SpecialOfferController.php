<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
        SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
        $currentUrl = url()->current();
        SEOMeta::setCanonical($currentUrl);

        $parentCategories = ProductCategory::parentCategories()->has('categoryProducts')->get();
        return view('web.specialoffers')->with('parentCategories',$parentCategories);
    }
}
