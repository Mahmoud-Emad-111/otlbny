<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function Store(OrderRequest $request){
    ##################Order image##############################
        // $card_image=$request->file('card_image');
        if ($request->hasFile('image')) {
            $order_image=$request->file('image');
            $order_image_name=rand(1,9999).time().$order_image->getClientOriginalName();
            $order_image->move('order_image',$order_image_name);

        }else{
            $order_image_name=Null;
        }

    ####################################################

        Order::create([
            'from'=>$request->from,
            'to'=>$request->to,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'image'=>$order_image_name,
            'user_id'=>auth('sanctum')->user()->id,
            'vehicle_id'=>$request->vehicle_id,
        ]);
        return $this->handelResponse('','The order has been added successfully');

    }

    #################get all order data#####################
    public function get(){
        $orders_data= Order::Where('vehicle_id',auth('sanctum')->user()->vehicle_id)->get();
        return $this->handelResponse($orders_data,'These are all orders');
    }

    public function price_offer(){
        return Order::with('offer')->get();
    }
}
