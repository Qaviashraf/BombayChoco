<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOMeta::setTitle('Bombay Choco N Nuts | Best Online Dryfruits in Pakistan');
        SEOMeta::setDescription("Craving Bombay Choco N Nuts? Get Pakistan's best dry fruits & nuts online. Fast delivery, great selection!");
        $currentUrl = url()->current();
        SEOMeta::setCanonical($currentUrl);
        
        $cartItems = \Cart::getContent();
        
        return view('web.cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $productVariants = ProductVariant::where('product_id',$request->product_id)->where('id',$request->variant_id)->first();

        \Cart::add([
            'id' => $request->product_id,
            'name' => $product->title,
            'photo' => $product->photo,
            'price' => $productVariants->sale_price,
            'quantity' => $request->quantity,
            'weight' => $productVariants->weight,
        ]);
        $cartItems = \Cart::getContent();
        // session()->flash('success', 'Product is Added to Cart Successfully !');

        return response([
            'data'=> $cartItems
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        // session()->flash('success', 'Item Cart is Updated Successfully !');

        return response()->json('success');
    }

    public function cartUpdate(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        // session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        // session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->back();
        
    }
    public function clearAllCart()
    {
        \Cart::clear();

        return redirect('/checkout');
        // session()->flash('success', 'All Item Cart Clear Successfully !');
    }

    public function test()
    {
        $cartItems = \Cart::getContent();  
        
        return $cartItems;
    }
}
