<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $clients=User::all()->count();
        $deliveries=Delivery::all()->count();
        $merchants=Merchant::all()->count();
        $orders=Order::all()->count();
        $data=[
            'clients'=>$clients,
            'deliveries'=>$deliveries,
            'merchants'=>$merchants,
            'orders'=>$orders,
        ];
        return view('home')->with('data',$data);
    }
}
