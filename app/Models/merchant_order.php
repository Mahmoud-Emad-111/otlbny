<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merchant_order extends Model
{
    use HasFactory;
    protected $fillable=[
        'to',
        'name',
        'phone',
        'description',
        'price',
        'shipping_rate',
        'total',
        'merchant_id',
    ];

    public function merchant(){
        return $this->belongsTo(Merchant::class);
    }

    

}
