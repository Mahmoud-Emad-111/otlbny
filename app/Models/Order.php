<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'from',
        'to',
        'phone',
        'image',
        'description',
        'user_id',
        'vehicle_id',
    ];
    public function vehicle(){
        return $this->belongsTo(Vehicles::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function offer(){
        return $this->belongsToMany(Delivery::class,'price_offers');
    }
}
