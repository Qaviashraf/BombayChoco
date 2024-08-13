<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guard_name = 'sanctum';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'password',
        'photo',
        'reference',
        'id_card_number',
        'telephone',
        'mobile_number',
        'mobile_number_2',
        'mobile_number_3',
        'address',
        'company_name',
        'nif',
        'stat',
        'cif',
        'rcs',
        'approval_status',
        'approval_status_updated_by',
        'approval_status_updated_on',
        'verification_status',
        'verification_status_updated_by',
        'verification_status_updated_on',
        'is_disabled',
        'is_visible_price',
        'city_id',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllPermissionsAttribute() {
        return json_encode([
            'roles' => $this->getRoleNames(),
            'permissions' => $this->getAllPermissions()->pluck('name'),
        ]);
    }
    public function city(){
        return  $this->belongsTo('App\Models\City','city_id');
    }

    public function orderPayments(){
        return $this->hasMany('App\Models\OrderPayment', 'customer_id');
    }
    
    public function orders(){
        return $this->hasMany(Order::class,'customer_id');
    }
    
    public function createdBy(){
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

}
