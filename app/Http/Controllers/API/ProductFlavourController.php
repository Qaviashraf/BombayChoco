<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductFlavour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductFlavourController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:product_flavours']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //Declare a global variable with relation orders!
        $category= ProductFlavour::with(['createdBy','updatedBy']);
        //Check if there is any search value
        if($request->search!=""){
            $category->where( 'name', 'LIKE', '%' . $request->search . '%' );
        }
        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            $category=$category->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
        }else{
            //Default Sorting
            $category=$category->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $category->paginate($request->numRows);
        }else{
            return $category->get();
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
        if(auth()->user()->can('create_product_flavour')){
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'image'=>'required',
            ]);
            if($request['image']){
                $name=time().'.'.explode('/', explode(':', substr($request->image,0,strpos($request->image, ';')))[1])[1];
                \Image::make($request->image)->save(public_path('images/product-flavours/'.$name));
            }else{
                $name= null;
            }
            $category=ProductFlavour::create([
                'name'=>$request->name,
                'image'=>$name,
                'created_at'=> Carbon::now(),
                'created_by'=>Auth::user()->id
            ]);
            return response()->json("Record created successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flavour  $category
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFlavour $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductFlavour  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFlavour $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flavour  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(auth()->user()->can('edit_product_flavour')){
            $flavours = ProductFlavour::findOrfail($id);
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'image'=>'required',
            ]);
            if($request['image']!=$flavours->image){
                $name=time().'.'.explode('/', explode(':', substr($request->image,0,strpos($request->image, ';')))[1])[1];
                $publicPath=public_path('images/product-flavours/'.$name);
                \Image::make($request->image)->save($publicPath);
                if((file_exists(public_path('images/product-flavours/'.$flavours->image)))){
                    @unlink(public_path('images/product-flavours/'.$flavours->image));
                }
                $request->merge(['image'=>$name]);
            }
            else {
                 $name = $flavours->image;
            }
            $flavours->update([
                'name'=>$request->name,
                'image'=>$name,
                'updated_at'=> Carbon::now(),
                'updated_by'=>Auth::user()->id
            ]);
            return response()->json("Record updated successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductFlavour  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete_product_flavour')){
            $flavours = ProductFlavour::findOrFail($id);
            $flavours->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
