<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderStatusController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:order_status']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Declare a global variable with relation orders!
        $orderStatuses=OrderStatus::with(["createdBy", "updatedBy"]);
                
        //Check if there is any search value
        if($request->search!=""){
            $orderStatuses->where(function($query) use($request) {
                $query->where( 'name', 'LIKE', '%' . $request->search . '%' );
            });
        }

        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            $orderStatuses=$orderStatuses->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
        }else{
            //Default Sorting
            $orderStatuses=$orderStatuses->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $orderStatuses->paginate($request->numRows);
        }else{
            return $orderStatuses->get();
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
        if(auth()->user()->can('create_order_status'))
        {
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'status_type'=>'required',
            ]);

            $orderStatuses=OrderStatus::create([
                'name'=>$request->name,
                'status_type'=>$request->status_type,
                'created_by' => Auth::user()->id,
                'created_at'=>Carbon::now(),
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
        if(auth()->user()->can('edit_order_status'))
        {
            $orderStatuses = OrderStatus::findOrfail($id);
            $this->validate($request, [
                'name'=>'required|string',
                'status_type'=>'required',
            ]);

            $orderStatuses->update([
                'name'=>$request->name,
                'status_type'=>$request->status_type,
                'updated_by' => Auth::user()->id,
                'updated_at'=>Carbon::now(),
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
        if(auth()->user()->can('delete_order_status')){
            $orderStatuses = OrderStatus::findOrFail( $id);
            $orderStatuses->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
