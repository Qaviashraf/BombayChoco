<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'order_histories';

    protected $fillable =[
        'order_id',
        'customer',
        'order_status_id',
        'order_status_updated_by',
        'order_status_updated_at'
    ];
    public function customer(){
        return $this->belongsTo('App\Models\User','customer');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function orderStatus(){
        return $this->belongsTo('App\Models\OrderStatus','order_status_id');
    }
    public function updatedBy(){
        return $this->belongsTo('App\Models\User','order_status_updated_by');
    }
}
