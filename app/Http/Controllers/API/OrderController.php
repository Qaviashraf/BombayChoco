<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderHistory;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Tax;
use App\Models\User;
use App\Models\UserToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Traits\HandleReferenceNumberTrait; // Trait
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    use HandleReferenceNumberTrait; // Trait
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'permission:orders']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::with(['orderDetails.product','paymentMethod', 'customer', 'orderStatus', 'createdBy', 'updatedBy'])->orderBy('id', 'desc')->get();
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
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
        ]);

        $orderSubtotal = 0;
        $user = User::where('email',$request->email)->first();
        if ($user == null) {
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->password=Hash::make('bombay123');
            $user->photo='profile.png';
            $user->assignRole(4);
            $user->save();
        }else{
            $user->name=$request->name;
            $user->address=$request->address;
            $user->save();
        }
        
        $order =  new Order();
        $order->reference =  'BOMBAY/ORDER/'.(Order::max('id')+001).'/'.date('y');
        $order->customer_id = $user->id;
        $order->bill_no = 'C/BILL/NUMBER/'.(Order::max('id')+001).'/'.date('y');
        $order->order_status_id = 1;
        $order->payment_method_id = $request->payment_method_id;
        $order->payment_status = "unpaid";
        $order->order_date = Carbon::now();
        $order->notes = $request->notes;
        $order->sub_total = \Cart::getTotal();
        $order->created_by = $user->id;
        $order->created_at = Carbon::now();
        $order->save();
        // Orders details
        if ($order) {
            $cartItems = \Cart::getContent();
            foreach ($cartItems as  $item) {
                // Save Order Detail 
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item->id;
                $orderDetail->quantity = $item->quantity;
                $orderDetail->sale_price = $item->price;
                $orderDetail->weight = $item->weight;
                $orderDetail->sub_total = ($item->quantity * $item->price);
                $orderSubtotal += $orderDetail->sub_total;
                $orderDetail->save();
            }
            $order->sub_total = $orderSubtotal;
            $order->save();

            // Send Email For Admin's
            $allEmails = [
                'bombaychocnnuts1976@gmail.com'
            ];
            foreach ($allEmails as $data) {
                Mail::send('email.orderPlaced', ['order' => $order, 'order_details' => $order->orderDetails,'customer' => $order->customer->name,'user'=>$order->customer,'order_status_id'=>1,'order_status',$order->orderStatus,'role'=>'Admin'],  function ($message) use ($order,$data) {
                    $message->to($data,'')
                    ->subject('You have received an Order No.'. $order->reference);
                    $message->from('bombaychocnnuts1976@gmail.com', 'Bombay Choc n nuts');
                }); 
            }

            // Email For User
            if ($order->customer_id != null) {
                if ($order->customer->email != null) {
                    Mail::send('email.orderPlaced', ['order' => $order, 'order_details' => $order->orderDetails,'customer' => $order->customer->name,'user'=>$order->customer,'order_status_id'=>1,'order_status',$order->orderStatus,'role'=>'user'],  function ($message) use ($order) {
                        $message->to($order->customer->email,'')
                        ->subject('Order No. ' . $order->reference.' confirmation');
                        $message->from('bombaychocnnuts1976@gmail.com', 'Bombay Choc n nuts');
                    });
                }
            }
        }
        \Cart::clear();
        return redirect('/thankyou')->with(['data' => $order, 'cart' => $cartItems]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //Remove OrderDetail  
    public function removeOrderDetail($id)
    {
        //
    }
    // Update Order Status
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::where('id', $id)->with(['orderDetails','orderStatus'])->first();
        // Order History
        // $orderHistories = new OrderHistory();
        // $orderHistories->order_id = $order->id;
        // $orderHistories->customer = $order->customer_id;
        // $orderHistories->order_status_id = $request->order_status_id;
        // $orderHistories->order_status_updated_at = Carbon::now();
        // $orderHistories->order_status_updated_by = Auth::user()->id;
        // $orderHistories->save();
        // update order status
        $order->update([
            "order_status_id" => $request->order_status_id,
        ]);
        $user = User::where('id',$order->customer_id)->first();
        if ($user->email !=null) {
            // Current Order Status
            $currentStatus = OrderStatus::where('id',$request->order_status_id)->first();
            // when order status is shipped/dispatched or canceled
            if ($request->order_status_id == 3 || $request->order_status_id == 5) {
                // Send Email for User
                Mail::send('email.orderPlaced', ['order' => $order, 'order_details' => $order->orderDetails,'customer' => $order->customer->name,'user'=> $user,'order_status_id'=>$request->order_status_id,'order_status'=>$currentStatus,'role'=>'user'],  function ($message) use ($order,$user,$currentStatus) {
                    $message->to($user->email,'')
                    ->subject('Update regarding Order No. ' . $order->reference.' '. $currentStatus->name);
                    $message->from('bombaychocnnuts1976@gmail.com', 'Bombay Choc n nuts');
                });
            }
        }
        return response()->json("successfully updated order status", 200);
        
    }

    //Display Order Status History 
    public function orderStatusHistory($id)
    {
        return  OrderHistory::where('order_id',$id)->with(['order','customer','orderStatus','updatedBy'])->get();
    }

    // for website
    public function orderHistory(Request $request)
    {
        $orderHistory = Order::where('customer_id',Auth::user()->id)->with(['orderDetails'])->get();

        return view('web.order-history')->with('orderHistory',$orderHistory);
    }
}
