<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\price_offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceOfferController extends Controller
{
    //

    public function Store(Request $request){
        $validate=Validator::make($request->all(),[
            'price'=> 'required|integer',
            'order_id'=>'required'
           ]);
            if($validate->fails()){
                return response()->json($validate->errors());
        }
        price_offer::create([
            'price'=>$request->price,
            'order_id'=>$request->order_id,
            'delivery_id'=>auth('sanctum')->user()->id,
        ]);

        return $this->handelResponse('','The price has been added successfully');

    }

    public function get(){
       $user=auth('sanctum')->user();
       $order=Order::Where('user_id',$user->id)->Where('status','pending')->first();
       $price_offer=price_offer::Where('order_id',$order->id)->get();
       return $this->handelResponse($price_offer,'These are all price offer');

    }

    public function approved(Request $request){
        $validate=Validator::make($request->all(),[
            'price_offer_id'=> 'required',

        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        }
        $price_offer=price_offer::find($request->price_offer_id);
        $price_offer->status='approved';
        $price_offer->save();
        /////////////////////////////////////
        $order=Order::find($price_offer->order_id);
        $order->status='in_delivery';
        $order->save();
       
        ////////////////////////////////////////

        price_offer::Where('order_id',$order->id)->Where('status','pending')->delete();

        $delivery=auth('sanctum')->user();
       return $this->handelResponse($delivery,'The delivery price has been accepted');

    }


    public function Rejection(Request $request){
        $validate=Validator::make($request->all(),[
            'price_offer_id'=> 'required',

        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        }

        price_offer::find($request->price_offer_id)->delete();

        return $this->handelResponse('','Rejected delivery price');

    }



}
