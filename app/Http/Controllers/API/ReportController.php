<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    //Customer Report
    public function customerReport(Request $request)
    {
        if (auth()->user()->can("customer_report")) {
            $customers = User::with(['orders','orders.orderDetails','orders.orderPayments','orders.orderStatus'])->whereHas('roles',function($q){
                $q->where('roles.id', 2);
            })->withCount([
                'orders AS total_sales' => function ($query) {
                    $query->select(DB::raw("SUM(grand_total) as grand_total"));
                }
            ])
            ->withCount([
                'orderPayments As total_paid_amount' => function ($query) {
                    $query->select(DB::raw("SUM(amount) as paid_amount"));
                }
            ])->get();
            // Calculate Remaining Amount
            if (count($customers) > 0) {
                foreach ($customers as $data) {
                    $data['remaining_amount'] = $data['total_sales'] - $data['total_paid_amount'];
                }
            }
            return $customers;
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
    // Orders Report
    public function ordersReport(Request $request)
    {
        if (auth()->user()->can('orders_report')) {
            // Get the Sale
            $sale = Order::select("orders.order_date", DB::raw("SUM(grand_total) as grand_total"));

            // search via from date and to date
            if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
                $sale = $sale->whereBetween(DB::raw('DATE(order_date)'), [$request->from_date, $request->to_date]);
            }

            // search via from date
            if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {

                $sale = $sale->whereDate('order_date', '>=', $request->from_date);
            }

            // search via to date
            if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

                $sale = $sale->whereDate('order_date', '<=', $request->to_date);
            }
            
          
            // Group by order date
            $sale = $sale->groupBy(DB::raw("DATE(order_date)"));

            $sale = $sale->orderBy('id', 'desc')->get();

            if (count($sale) > 0) {
                foreach($sale as $index => $order)
                {
                    $newSales = Order::whereDate('order_date', $order->order_date)->with('orderPayments')
                    ->withCount([
                        'orderPayments AS total_amount_paid' => function ($query) {
                            $query->select(DB::raw("SUM(amount) as sale_payment_total"));
                        }
                    ])
                    ->get();
                    $totalAmountPaid = 0;
                    foreach($newSales as $newSale)
                    {
                        if(count($newSale->orderPayments) > 0)
                        {
                            $totalAmountPaid += $newSale->total_amount_paid;
                        }
                    }
                    
                    $sale[$index]->total_amount_paid = $totalAmountPaid;
                    // Calculate Remaining Amount
                    $sale[$index]->remaining_amount = $order['grand_total']-$sale[$index]->total_amount_paid;
                }
            }
            return $sale;
        } else {
            return response()->json("Unauthorized", 401);
        }
        
    }
    // Order Detail Report
    public function orderDetailReport(Request $request)
    {
        if (auth()->user()->can('orders_report')) {
            // Get the Order
            $sale = Order::with(['paymentMethod', 'createdBy', 'customer','orderPayments','orderPayments.customer','orderPayments.paymentMethod','orderStatus'])
            ->whereDate('order_date', $request->order_date);
            // Get Data with Order Payment Amount Paid
            $sale->withCount([
                'orderPayments AS total_amount_paid' => function ($query) {
                    $query->select(DB::raw("SUM(amount) as sale_payment_total"));
                }
            ]);
            
            $sale = $sale->orderBy('id', 'desc')->get();
            return $sale;
        } else {
            return response()->json("Unauthorized", 401);
        }
    }
    // Stock Report
    public function stockReport(Request $request)
    {
        if (auth()->user()->can('stock_report')) {
            $products = Product::all();
            $result = [];
            foreach ($products as $product) {
                $product_id = $product->id;
                $pName = $product->name;
                $stock = $product->stock_quantity;
                //Order
                $orders = OrderDetail::where('product_id', $product_id)->with(['order']);
                // search via from date and to date
                if ($request->from_date != "Invalid date" && $request->to_date != "Invalid date" && $request->from_date != "" && $request->to_date != "") {
                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereBetween(DB::raw('DATE(order_date)'), [$request->from_date, $request->to_date]);
                    })->get();
                }

                // search via from date
                if ($request->from_date != "Invalid date" && $request->to_date == "Invalid date") {
                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereDate('order_date', '>=', $request->from_date);
                    })->get();
                }

                // search via to date
                if ($request->from_date == "Invalid date" && $request->to_date != "Invalid date") {

                    $orders = $orders->whereHas("order",function ($q) use ($request){
                        $q->whereDate('order_date', '<=', $request->to_date);
                    })->get();
                }
                $orders = $orders->sum('quantity');

                $sold = $orders;

                $available = ($stock - $sold);

                array_push($result,[
                    "id" => $product_id,
                    "product" => $pName,
                    "entry"=>$stock,
                    "sold"=> $sold,
                    "available"=>$available,
                ]);
            }
            return $result;
        }else {
            return response()->json("Unauthorized", 401);
        }
    }
}
