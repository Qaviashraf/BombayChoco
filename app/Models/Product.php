<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'code',
        'color_code',
        'slug',
        'meta_title',
        'meta_description',
        'brand_id',
        'product_category_id',
        'product_flavour_id',
        'product_weight',
        'photo',
        'is_disabled',
        'description',
        'stock',
        'more_info',
        'one_line_description',
        'created_by',
        'updated_by',
    ];
    
    public function productVariants(){
        return $this->hasMany(ProductVariant::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }
    public function productCategory(){
        return $this->belongsTo('App\Models\ProductCategory','product_category_id');
    }
    public function productFlavour(){
        return $this->belongsTo('App\Models\ProductFlavour','product_flavour_id');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
    
}
