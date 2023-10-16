<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\merchant_delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MerchantDeliveryController extends Controller
{

    public function approved(Request $request){
        $validate=Validator::make($request->all(),[
            'merchant_order_id'=> 'required',

        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        }

        merchant_delivery::create([
           'merchant_order_id'=>$request->merchant_order_id,
           'delivery_id'=>auth('sanctum')->user()->id,
        ]);

        return $this->handelResponse('','The merchants order has been accepted');

    }

    public function merchant_order_complete(Request $request){
        $validate=Validator::make($request->all(),[
            'merchant_order_id'=> 'required',

        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        }

        $oreder=merchant_delivery::find($request->merchant_order_id);
        $oreder->status='complete';
        return $this->handelResponse('','order merchant complete');

    }


}
