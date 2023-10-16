<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryRequest;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
{
    //
    ###########################  Register Delivery #################################

    public function Register(DeliveryRequest $request){
        ##################card_image##############################
        $card_image=$request->file('card_image');
        $card_image_name=time().$card_image->getClientOriginalName();
        $card_image->move('delivery_image',$card_image_name);
        ####################################################

        ##################license_image##############################

        $license_image=$request->file('license_image');
        $license_image_name=time().$license_image->getClientOriginalName();
        $license_image->move('delivery_image',$license_image_name);

        ####################################################

        ##################delivery_image##############################

        $image=$request->file('image');
        $image_name=time().$image->getClientOriginalName();
        $image->move('delivery_image',$image_name);

        ####################################################



        $delivery= Delivery::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'vehicle_id'=>$request->vehicle_id,
            'card_image'=>$card_image_name,
            'license_image'=>$license_image_name,
            'image'=>$image_name,
        ]);
        $res=[
            'name'=>$delivery->name,
            'token'=>$delivery->createToken($request->phone)->plainTextToken,
            'image'=>'delivery_image/'.$image_name,
        ];
        return $this->handelResponse($res,'You have been delivery registered  successfully');

    }


        ###########################  Login Delivery #################################

    public function Login(Request $request){
        $validate=Validator::make($request->all(),[
            'phone'=> 'required|max:11|min:11',
            'password'=> 'required',
            ]);
            if($validate->fails()){
                return response()->json($validate->errors());
            }

            if(Auth::guard('delivery')->attempt(['phone' => $request->phone, 'password' => $request->password])){
                $delivery = Auth::guard('delivery')->user();

                $response=[
                    'token'=>$delivery->createToken($request->phone)->plainTextToken,
                    'name'=>$delivery->name,
                    'image'=>'delivery_image/'.$delivery->image,

                ];
                return $this->handelResponse($response,'You have been Delivery Login successfully');
            }
            else{

                return response()->json( ['error'=>'Unauthorised'],401);
            }
    }


    public function index(){
        $data=Delivery::all();
        return view('user.delivery')->with('deliveries',$data);
    }

    public function Delete_Delivery($id){
        Delivery::find($id)->delete();
        return redirect('/Delivery');
    }

    public function change_status($id,Request $request){
        $status= Delivery::find($id)->first();
        $status->status=$request->delivery_status;
        $status->save();
        return redirect('/Delivery');

    }


    public function order_complete(Request $request){
        $validate=Validator::make($request->all(),[
            'order_id'=> 'required',
            ]);

        if($validate->fails()){
                return response()->json($validate->errors());
        }
        $order=Order::find($request->order_id);
        $order->status='complete';
        $order->save();
        return $this->handelResponse('','order complete');

    }

}
