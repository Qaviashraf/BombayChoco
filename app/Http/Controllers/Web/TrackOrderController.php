<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{

    public function index(Request $request)
    {  
        SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
        SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
        $currentUrl = url()->current();
        SEOMeta::setCanonical($currentUrl);
        $order = Order::where('reference',$request->reference)->with(['orderDetails','customer'])->first();
        return view('web.tracking')->with('order',$order);
    }

}
