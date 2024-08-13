<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFlavour extends Model
{
    use HasFactory;

    protected $table = 'product_flavours';

    protected $fillable =[
        'name',
        'image',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];


    public function createdBy(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User','updated_by');
    }
}
