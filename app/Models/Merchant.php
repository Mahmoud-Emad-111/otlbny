<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{
    use HasFactory,HasApiTokens;
    protected $guard='merchant';
    protected $fillable=[
        'company',
        'phone',
        'password',
        'extra_phone',
        'national_id',
        'address',
    ];
    protected $hidden = [
        'password',
    ];
    public function orders(){
        return $this->hasMany(merchant_order::class);
    }
}
