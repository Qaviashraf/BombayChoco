<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'product_id', 
        'customer_id', 
        'created_at',
        'updated_at',
    ];
    
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
