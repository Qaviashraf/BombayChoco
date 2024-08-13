<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Imports\ImportProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['auth', 'permission:products']);
    }

    public function index(Request $request)
    {
        //Declare a global variable with relation orders!
        $product=Product::with(['createdBy', 'updatedBy','productCategory'=>function($query) use ($request) {
            if($request->sortBy=="product_categories.name"){
              $query->orderBy('name', ($request->sortDesc=="true")?"desc":"asc");
            }
          }, 'brand'=>function($query) use ($request) {
            if($request->sortBy=="brands.name"){
              $query->orderBy('name', ($request->sortDesc=="true")?"desc":"asc");
            }
          },'productFlavour','productImages','productVariants']);
        
        //Check if there is any search value
        if($request->search!=""){
            if ($request->search == "No") {
                $product->where('is_disabled',0);
            }
            else if ($request->search == "Yes") {
                $product->where('is_disabled',1);
            }
            else
            {
                $product->where(function($query) use($request) {
                    $query->where( 'title', 'LIKE', '%' . $request->search . '%' )
                    ->orWhere('code', 'LIKE', '%' . $request->search . '%' )
                    ->orWhereHas('productCategory', function($query) use ($request){
                        $query->where('name', 'LIKE', '%' . $request->search . '%'  );
                    })
                    ->orWhereHas('brand', function($query) use ($request){
                        $query->where('name', 'LIKE', '%' . $request->search . '%'  );
                    });
                });
            }
        }

        //Check in any type of sorting
        if($request->sortBy!=""){
            //If the sorting is not related to Relations
            if ($request->sortBy != "product_category.name" && $request->sortBy != "brand.name") {
                $product=$product->orderBy($request->sortBy, ($request->sortDesc=="true")?"desc":"asc");
            }
        }else{
            //Default Sorting
            $product=$product->orderBy("id", "desc");
        }
        //Pagination
        if(isset($request->numRows) && $request->numRows>0){
            return $product->paginate($request->numRows);
        }else{
            return $product->get();
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
        if(auth()->user()->can('create_product')){
            $this->validate($request, [
                'title' => 'required',
                'slug' => 'required',
                'meta_title' => 'nullable',
                'meta_description' => 'nullable',
                'brand_id' => 'required',
                'product_category_id' => 'required',
                'product_flavour_id' => 'nullable',
                'photo'=>'required',
                'description' => 'required',
                'product_variants.*.bar_code'=>'required',    
                'product_variants.*.quantity'=>'required',    
                'product_variants.*.sale_price'=>'required',    
                'product_variants.*.weight'=>'required',    
                'image'=>'nullable',
                'is_disabled'=>'nullable',
                'stock'=>'nullable',
                'more_info'=>'nullable',
                'one_line_description'=>'nullable',
            ]);
            // Featured Image Work
            if($request['photo']){
                $name=time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
                \Image::make($request->photo)->save(public_path('images/product-images/'.$name));
            }else{
                $name= null;
            } 
            $product = new Product;
            $product->code = 'C/PRODUCT/'.(Product::max('id')+001).'/'.date('y');
            $product->title = $request->title;
            $product->color_code = $request->color_code;
            $product->slug = $request->slug;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->brand_id = $request->brand_id;
            $product->product_category_id = $request->product_category_id;
            $product->product_flavour_id = $request->product_flavour_id;
            $product->photo = $name;
            $product->is_disabled = $request->is_disabled;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->more_info = $request->more_info;
            $product->one_line_description = $request->one_line_description;
            $product->created_by = Auth::user()->id;
            $product->created_at = Carbon::now();
            $product->save();
            // Save Product Images
            if (isset($request->image) && $request->image !="") {
                $images = $request->image;
                foreach($images as $index => $image) {
                    $name=$index.time().'.'.explode('/', explode(':', substr($image['path'],0,strpos($image['path'], ';')))[1])[1];
                    \Image::make($image['path'])->save(public_path('images/product-images/'.$name));
                    $productImage= new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $name;
                    $productImage->save();
                }
            }
            // Save Product Variants
            if($product){
                foreach ($request->product_variants as $item) {
                    $productVariants = new ProductVariant();
                    $productVariants->product_id = $product->id;
                    $productVariants->bar_code =  $item['bar_code'];
                    $productVariants->weight =  $item['weight'];
                    $productVariants->quantity =  $item['quantity'];
                    $productVariants->sale_price =  $item['sale_price'];
                    $productVariants->save();
                }
            }
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
        if(auth()->user()->can('edit_product')){
            $product = Product::findOrfail($id);
                $this->validate($request, [
                    'title' => 'required',
                    'slug' => 'required',
                    'meta_title' => 'nullable',
                    'meta_description' => 'nullable',
                    'brand_id' => 'required',
                    'product_category_id' => 'required',
                    'product_flavour_id' => 'nullable',
                    'photo'=>'required',
                    'description' => 'required',
                    'product_variants.*.bar_code'=>'required',    
                    'product_variants.*.quantity'=>'required',    
                    'product_variants.*.sale_price'=>'required',    
                    'product_variants.*.weight'=>'required',    
                    'image'=>'nullable',
                    'is_disabled'=>'nullable',
                    'stock'=>'nullable',
                    'more_info'=>'nullable',
                    'one_line_description'=>'nullable',
                ]);
            // Update the featured image
            if($request['photo']!=$product->photo){
                $name=time().'.'.explode('/', explode(':', substr($request->photo,0,strpos($request->photo, ';')))[1])[1];
                $publicPath=public_path('images/product-images/'.$name);
                \Image::make($request->photo)->save($publicPath);
                if((file_exists(public_path('images/product-images/'.$product->photo)))){
                    @unlink(public_path('images/product-images/'.$product->photo));
                }
                $request->merge(['photo'=>$name]);
            }
            else {
                 $name = $product->photo;
            }

            $product->update([
                "title" => $request->title,
                "color_code" => $request->color_code,
                "slug" => $request->slug,
                "meta_title" => $request->meta_title,
                "meta_description" => $request->meta_description,
                "brand_id" => $request->brand_id,
                "product_category_id" => $request->product_category_id,
                "product_flavour_id" => $request->product_flavour_id,
                "photo" => $name,
                "is_disabled" => $request->is_disabled,
                "description" => $request->description,
                "stock" => $request->stock,
                "more_info" => $request->more_info,
                "one_line_description" => $request->one_line_description,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);

            // Product Image update work
            if (count($request->image_copy) > 0){
                $images = $request->image_copy;
                foreach($images as $index => $image) {
                    $name=$index.time().'.'.explode('/', explode(':', substr($image['path'],0,strpos($image['path'], ';')))[1])[1];
                    \Image::make($image['path'])->save(public_path('images/product-images/'.$name));
                    $productImage= new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $name;
                    $productImage->save();
                }
            }
            //Update Product Variants 
            if ($product) {
                foreach ($request->product_variants as $row) {
                    $productVariant=ProductVariant::where('id', $row['id']);
                    // When Product is already exists
                    if($productVariant->get()->count()>0){
                            $productVariant->update([
                                "bar_code"=>$row['bar_code'],
                                "quantity"=> $row['quantity'],
                                "sale_price"=>$row['sale_price'],
                                "weight"=>$row['weight']
                            ]); 
                    }else{
                    // Save new Products
                    $productVariant = new ProductVariant();
                    $productVariant->product_id = $product->id;
                    $productVariant->bar_code   = $row['bar_code'];
                    $productVariant->quantity  = $row['quantity'];
                    $productVariant->sale_price   = $row['sale_price'];
                    $productVariant->weight   = $row['weight'];
                    $product->productVariants()->save($productVariant);
                    }
                }
            }

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
        if(auth()->user()->can('delete_product')){
            $product = Product::findOrFail($id);
            $productImages = ProductImage::where('product_id',$id)->get();
            // Product images deleted
            foreach ($productImages as $key => $value) {
                if((file_exists(public_path('images/products-images/'.$value['image'])))){
                    @unlink(public_path('images/products-images/'.$value['image']));
                }
            }
            $product->productImages()->delete();
            $product->productVariants()->delete();
            $product->delete();
            return response()->json("Record deleted successfully", 200);
        }else{
            return response()->json("Unauthorized", 401);
        }
    }
    //Remove Product Images 
    public function removeProductImages($id)
    {
        // delete the Product Images 
        $file = ProductImage::findOrfail($id);
        $file->delete();
        return response()->json("Record deleted successfully", 200);
    }
    //Remove Product Variants 
    public function removeProductVariants($id)
    {
        // delete the Product Variants 
        $data = ProductVariant::findOrfail($id);
        $data->delete();
        return response()->json("Record deleted successfully", 200);
    }
}
