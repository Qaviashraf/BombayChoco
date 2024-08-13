<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;

    protected $table = 'home_sliders';

    protected $fillable =[
        'title',
        'image',
        'redirect_to',
        'product_id',
        'product_category_id',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function productCategory(){
        return $this->belongsTo('App\Models\ProductCategory','product_category_id');
    }
    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
}
