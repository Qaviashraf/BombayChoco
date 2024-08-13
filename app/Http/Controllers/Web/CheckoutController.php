<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
   public function index(Request $request)
   {
      $cartItems = \Cart::getContent();
      SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
      SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
      $currentUrl = url()->current();
      SEOMeta::setCanonical($currentUrl);
      return view('web.checkout', compact('cartItems'));
   }
}
