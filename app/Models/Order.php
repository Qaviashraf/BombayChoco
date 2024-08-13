<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id', 
        'bill_no', 
        'order_status_id',
        'payment_method_id',
        'order_date',
        'sub_total',
        'discount',
        'total_product_tax',
        'grand_total',
        'payment_status',
        'notes',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    
    public function orderPayments(){
        return $this->hasMany('App\Models\OrderPayment');
    }

    public function orderDetails(){
        return $this->hasMany('App\Models\OrderDetail');
    }
    public function orderHistories(){
        return $this->hasMany('App\Models\OrderHistory');
    }
    public function customer(){
        return $this->belongsTo('App\Models\User');
    }
    public function orderStatus(){
        return $this->belongsTo('App\Models\OrderStatus');
    }
    public function paymentMethod(){
        return $this->belongsTo('App\Models\PaymentMethod');
    }
    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
}
