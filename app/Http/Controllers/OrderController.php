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

        $user=auth('sanctum')->user();
        $status=Order::Where('user_id',$user->id)->Where('status','!=','complete')->exists();

        if($status){
        return $this->handelResponse('','You cannot add a new order before it completes the current order');

        }


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
    ////////////////logout/////////////////////////


    public function Logout(){
            
    }


    #################get all order data#####################
    public function get(){
        $orders_data= Order::Where('vehicle_id',auth('sanctum')->user()->vehicle_id)->get();
        return $this->handelResponse($orders_data,'These are all orders');
    }
    //////////////////////////////////////////
    public function price_offer(){
        return Order::with('offer')->get();
    }

    public function index(){
        $data=Order::all();
        return view('orders.all_orders')->with('orders',$data);
    }

    public function Delete_order($id){
        Order::find($id)->delete();
        return redirect('/Order');
    }

    public function order_pending(){
        $data=Order::Where('status','pending')->get();
        return view('orders.order_pending')->with('orders',$data);

    }
    public function order_delivery(){
        $data=Order::Where('status','in_delivery')->get();
        return view('orders.order_delivery')->with('orders',$data);

    }
    public function order_complete(){
        $data=Order::Where('status','complete')->get();
        return view('orders.order_comblete')->with('orders',$data);

    }




}
