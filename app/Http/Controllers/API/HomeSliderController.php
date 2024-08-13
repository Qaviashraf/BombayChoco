<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeSliderController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'permission:home_sliders']);
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
        $homeSlider= HomeSlider::with(['product','productCategory','createdBy','updatedBy']);
        //Check if there is any search value
        if($request->search!=""){
            $homeSlider->where( 'title', 'LIKE', '%' . $request->search . '%' );
        }
        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            $homeSlider=$homeSlider->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
        }else{
            //Default Sorting
            $homeSlider=$homeSlider->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $homeSlider->paginate($request->numRows);
        }else{
            return $homeSlider->get();
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
        if(auth()->user()->can('create_home_slider')){
            $this->validate($request, [
                'title'=>'required',
                'redirect_to'=>'required',
                'product_id'=>'required_if:redirect_to,Product',
                'product_category_id'=>'required_if:redirect_to,Category',
                'image'=>'required',
            ]);
            if($request['image']){
                $name=time().'.'.explode('/', explode(':', substr($request->image,0,strpos($request->image, ';')))[1])[1];
                \Image::make($request->image)->save(public_path('images/home-sliders/'.$name));
            }else{
                $name= null;
            }
            $homeSlider=HomeSlider::create([
                'title'=>$request->title,
                'redirect_to'=>$request->redirect_to,
                'product_id'=>$request->product_id,
                'product_category_id'=>$request->product_category_id,
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
     * @param  \App\Models\Category  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(auth()->user()->can('edit_home_slider')){
            $categories = HomeSlider::findOrfail($id);
            $this->validate($request, [
                'title'=>'required',
                'redirect_to'=>'required',
                'product_id'=>'required_if:redirect_to,Product',
                'product_category_id'=>'required_if:redirect_to,Category',
                'image'=>'required',
            ]);
            if($request['image']!=$categories->image){
                $name=time().'.'.explode('/', explode(':', substr($request->image,0,strpos($request->image, ';')))[1])[1];
                $publicPath=public_path('images/home-sliders/'.$name);
                \Image::make($request->image)->save($publicPath);
                if((file_exists(public_path('images/home-sliders/'.$categories->image)))){
                    @unlink(public_path('images/home-sliders/'.$categories->image));
                }
                $request->merge(['image'=>$name]);
            }
            else {
                 $name = $categories->image;
            }
            $categories->update([
                'title'=>$request->title,
                'redirect_to'=>$request->redirect_to,
                'product_id'=>$request->product_id,
                'product_category_id'=>$request->product_category_id,
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
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('delete_home_slider')){
            $categories = HomeSlider::findOrFail($id);
            $categories->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
}
