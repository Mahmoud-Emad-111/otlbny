<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchant_ordersRequest;
use App\Models\merchant_order;
use Illuminate\Http\Request;

class MerchantOrderController extends Controller
{
    //
######################## Add a request to a merchant #######################
    public function Store(Merchant_ordersRequest $request){
        merchant_order::create([
            'to'=>$request->to,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'price'=>$request->price,
            'shipping_rate'=>$request->shipping_rate,
            'total'=>$request->total,
            'merchant_id'=>auth('sanctum')->user()->id,
        ]);
        return $this->handelResponse('','The merchant order has been added successfully');

    }

    public function get(){
        $orders_data=merchant_order::all();
        return $this->handelResponse($orders_data,'These are all orders');
        
    }


    public function Delete_order($id){
        merchant_order::find($id)->delete();
        return redirect()->back();
    }
}
