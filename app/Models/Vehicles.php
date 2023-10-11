<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    protected $fillable=[
        'vehicle'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }

}
