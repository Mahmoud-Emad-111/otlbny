<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class price_offer extends Model
{
    use HasFactory;

    protected $fillable=[
        'price',
        'order_id',
        'delivery_id',
    ];

}
