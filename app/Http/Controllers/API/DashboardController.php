<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    // Get Latest Orders
    public function getLatestOrders()
    {
        $latestOrders = Order::with(['customer','orderStatus'])
        ->orderBy('id', 'desc')->take(10)->get();
        return $latestOrders;
    }
}