<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('customer_id',Auth::user()->id)->get();
        
        return view('web.wishlist-product')->with('wishlists',$wishlists);
    }

    public function store(Request $request)
    {
        $wishlist = new Wishlist();
        $wishlist->product_id = $request->product_id;
        $wishlist->customer_id = Auth::user()->id;
        $wishlist->save();

        return redirect()->back();
    }
}
