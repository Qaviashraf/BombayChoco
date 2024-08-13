<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPasswordModel extends Model
{
    use HasFactory;

   public $primary_key = ['id'];

   protected $table = 'api_password_reset_token';

   public $fillable=['user_id','token_signature','token_type','used_token','expires_at','created_at','updated_at'];
}
