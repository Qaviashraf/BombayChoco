<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name', 
        'created_by', 
        'updated_by',
    ];

    public function createdBy(){
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User', 'updated_by');
    }
}
