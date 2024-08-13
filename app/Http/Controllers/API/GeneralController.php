<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Setting;
use App\Models\ProductCategory;
use App\Models\ProductFlavour;
use App\Models\User;

class GeneralController extends Controller
{
    // get all permissions
    public function getAllPermissions(Request $request)
    {
        //
        //Declare a global variable with relation orders!
        $permission = Permission::whereNotNull('name');
        //Check if there is any search value
        if ($request->search != "") {
            $permission->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('label', 'LIKE', '%' . $request->search . '%')
                ->orWhere('french_label', 'LIKE', '%' . $request->search . '%');
        }
        //Check in any type of sorting
        if ($request->sortBy != "") {
            //If the sorting is not related to Relations
            $permission = $permission->orderBy($request->sortBy, ($request->sortDesc == "true") ? "desc" : "asc");
        } else {
            //Default Sorting
            $permission = $permission->orderBy("id", "asc");
        }
        //Pagination
        if (isset($request->numRows) && $request->numRows > 0) {
            return $permission->paginate($request->numRows);
        } else {
            return $permission->get();
        }
    }

    //  get all roles
    public function getAllRoles(Request $request)
    {
        //
        //Declare a global variable with relation orders!
        $role = Role::with('permissions')->where('id', '!=', 1)->where('id', '!=', 2);
        //Check if there is any search value
        if ($request->search != "") {
            $role->where('name', 'LIKE', '%' . $request->search . '%');
        }
        //Check in any type of sorting
        if ($request->sortBy != "") {
            //If the sorting is not related to Relations
            $role = $role->orderBy($request->sortBy, ($request->sortDesc == "true") ? "desc" : "asc");
        } else {
            //Default Sorting
            $role = $role->orderBy("id", "desc");
        }
        //Pagination
        if (isset($request->numRows) && $request->numRows > 0) {
            return $role->paginate($request->numRows);
        } else {
            return $role->get();
        }
    }

    //    Get Settings Data
    public function getSetting(Request $request)
    {
        //
        return Setting::first();
    }
    //    Get Product Categories Data
    public function getCategories(Request $request)
    {
        //
        return ProductCategory::all();
    }
    //    Get Product Flavours Data
    public function getProductFlavours(Request $request)
    {
        //
        return ProductFlavour::all();
    }
    //    Get Brands Data
    public function getBrands(Request $request)
    {
        //
        return Brand::all();
    }

    // Get All Parent Categories
    public function getAllParentCategories()
    {
        $parentCategories = ProductCategory::parentCategories()->get();

        return response()->json($parentCategories, 200);
    }
    // Get All Child Categories for mobile app
    public function getAllChildCategories()
    {
        $childCategories = ProductCategory::whereNotNull('parent_id')
            ->with(['categoryProducts.productImages'])->get();

        foreach($childCategories as $category){
            foreach($category->categoryProducts as $product){
                $discount_detail = $this->calculateDiscount($product->id);
                $product->discount_detail = $discount_detail;
            };
        }

        return response()->json($childCategories, 200);
    }

    // Get All Product Categories
    public function getAllProductCategories()
    {
        $productCategories = ProductCategory::with(['childCategories'])->parentCategories()->get();

        return response()->json($productCategories, 200);
    }
    // Get Chid Categories via Parent For portal
    public function getChildCategories(Request $request)
    {
        if ($request->parent_id) {
            $parentCategories = ProductCategory::where('parent_id', $request->parent_id)->get();

            return response()->json($parentCategories, 200);
        } else {
            return response()->json('Something Went Wrong', 401);
        }
    }
    // Get All Products
    public function getAllProducts(Request $request)
    {
        $products = Product::where('is_disabled', 0)->get();
        return response()->json($products);
    }
    // Get All Payment Methods
    public function getAllPaymentMethods(Request $request)
    {
        $paymentMethods = PaymentMethod::all();

        return response()->json($paymentMethods);
    }
    // Get All Customer
    public function getAllCustomers(Request $request)
    {
        $customers = User::whereHas('roles', function ($q) {
            $q->where('roles.id', 4);
        })->get();

        return response()->json($customers);
    }
    // Get All Order Statuses for portal
    public function getAllOrderStatus(Request $request)
    {
        // change order status condition 
        if ($request->order_status_id) {
            $orderStatuses = OrderStatus::where('id', '>', $request->order_status_id)->get();
        } else {
            $orderStatuses = OrderStatus::all();
        }
        return $orderStatuses;
    }
    // Get All Products
    public function getProductById($id)
    {
        $products = Product::where('id',$id)->where('is_disabled', 0)->with(['productVariants','productCategory'])->first();
        return response()->json($products);
    }
}
