<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Delivery extends Authenticatable
{
    use HasFactory,HasApiTokens;
    protected $guard='delivery';
    protected $fillable=[
        'name',
        'email',
        'phone',
        'password',
        'vehicle_id',
        'card_image',
        'license_image',
        'image',
        'status'
    ];
    protected $hidden = [
        'password',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicles::class);
    }

}
