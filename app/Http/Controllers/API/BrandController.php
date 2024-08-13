<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:brands']);
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
        $brand= Brand::with(['createdBy','updatedBy']);
        //Check if there is any search value
        if($request->search!=""){
            $brand->where( 'name', 'LIKE', '%' . $request->search . '%' );
        }
        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            $brand=$brand->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
        }else{
            //Default Sorting
            $brand=$brand->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $brand->paginate($request->numRows);
        }else{
            return $brand->get();
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
        if(auth()->user()->can('create_brand')){
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'image'=>'required',
                'banner_image'=>'nullable',
                'description'=>'nullable',
            ]);
            if($request['image']){
                $name=time().'.'.explode('/', explode(':', substr($request->image,0,strpos($request->image, ';')))[1])[1];
                \Image::make($request->image)->save(public_path('images/brands/'.$name));
            }else{
                $name= null;
            }
            if($request['banner_image']){
                $bannerImage=time().'.'.explode('/', explode(':', substr($request->banner_image,0,strpos($request->banner_image, ';')))[1])[1];
                \Image::make($request->banner_image)->save(public_path('images/brands/'.$bannerImage));
            }else{
                $bannerImage= null;
            }
            $brand=Brand::create([
                'name'=>$request->name,
                'image'=>$name,
                'banner_image'=>$bannerImage,
                'description'=>$request->description,
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
     * @param  \App\Models\Category  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(auth()->user()->can('edit_brand')){
            $categories = Brand::findOrfail($id);
            $this->validate($request, [
                'name'=>'required|string|max:64',
                'image'=>'required',
                'banner_image'=>'nullable',
                'description'=>'nullable',
            ]);
            if($request['image']!=$categories->image){
                $name=time().'.'.explode('/', explode(':', substr($request->image,0,strpos($request->image, ';')))[1])[1];
                $publicPath=public_path('images/brands/'.$name);
                \Image::make($request->image)->save($publicPath);
                if((file_exists(public_path('images/brands/'.$categories->image)))){
                    @unlink(public_path('images/brands/'.$categories->image));
                }
                $request->merge(['image'=>$name]);
            }
            else {
                 $name = $categories->image;
            }
            // Banner Image
            if($request['banner_image']!=$categories->banner_image){
                $bannerImage=time().'.'.explode('/', explode(':', substr($request->banner_image,0,strpos($request->banner_image, ';')))[1])[1];
                $publicPath=public_path('images/brands/'.$bannerImage);
                \Image::make($request->banner_image)->save($publicPath);
                if((file_exists(public_path('images/brands/'.$categories->banner_image)))){
                    @unlink(public_path('images/brands/'.$categories->banner_image));
                }
                $request->merge(['banner_image'=>$bannerImage]);
            }
            else {
                $bannerImage = $categories->banner_image;
            }
            $categories->update([
                'name'=>$request->name,
                'image'=>$name,
                'banner_image'=>$bannerImage,
                'description'=>$request->description,
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
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete_brand')){
            $categories = Brand::findOrFail($id);
            $categories->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
