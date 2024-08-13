<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['auth', 'permission:payment_methods']);
    }

    public function index(Request $request)
    {
        //Declare a global variable with relation orders!
        $paymentMethod=PaymentMethod::with(['createdBy','updatedBy']);
        //Check if there is any search value
        if($request->search!=""){
            $paymentMethod->where( 'name', 'LIKE', '%' . $request->search . '%' );
        }
        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            $paymentMethod=$paymentMethod->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
        }else{
            //Default Sorting
            $paymentMethod=$paymentMethod->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $paymentMethod->paginate($request->numRows);
        }else{
            return $paymentMethod->get();
        }
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
        //
        if(auth()->user()->can('create_payment_method')){
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'description'=>'nullable',
            ]);

            $paymentMethod=PaymentMethod::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'created_by'=>Auth::user()->id,
            ]);

            return response()->json("Record created successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
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
        if(auth()->user()->can('edit_payment_method')){
            $paymentMethod = PaymentMethod::findOrfail($id);
            $this->validate($request, [
                'name'=>'required|string',
                'description'=>'nullable',
            ]);

            $paymentMethod->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'updated_by' => Auth::user()->id,
            ]);

            return response()->json("Record updated successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete_payment_method')){
            $paymentMethod = PaymentMethod::findOrFail( $id);
            $paymentMethod->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
