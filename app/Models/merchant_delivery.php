<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merchant_delivery extends Model
{
    use HasFactory;

    protected $fillable=[
        'price',
        'merchant_order_id',
        'delivery_id',
        'status',
    ];
}
