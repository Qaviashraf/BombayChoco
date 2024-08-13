<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable =[
        'name',
        'image',
        'description',
        'banner_image',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    public function products(){
        return $this->hasMany(Product::class,'brand_id','id');
    }

    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
}
