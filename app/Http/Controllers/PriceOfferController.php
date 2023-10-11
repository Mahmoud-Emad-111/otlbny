<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\price_offer;
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
       $data=price_offer::all();
       return $this->handelResponse($data,'These are all price offer');

    }
}
