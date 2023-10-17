<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\merchantRequest;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MerchantController extends Controller
{
    //

    ###########################  SING IN Merchant  #################################
    public function Register(merchantRequest $request){
        $merchant= Merchant::create([
             'company'=>$request->company,
             'phone'=>$request->phone,
             'national_id'=>$request->national_id,
             'extra_phone'=>$request->extra_phone,
             'address'=>$request->address,
             'password'=>bcrypt($request->password),
         ]);
         $res=[
             'company'=>$merchant->company,
             'token'=>$merchant->createToken($request->phone)->plainTextToken,
         ];
        return $this->handelResponse($res,'You have been registered Merchant successfully');
    }

    ###########################  Login Merchant  #################################

    public function Login(Request $request){
        $validate=Validator::make($request->all(),[
            'phone'=> 'required|max:11|min:11',
            'password'=> 'required',
            ]);
            if($validate->fails()){
                return response()->json($validate->errors());
            }

            if(Auth::guard('merchant')->attempt(['phone' => $request->phone, 'password' => $request->password])){
                $merchant = Auth::guard('merchant')->user();

                $response=[
                    'token'=>$merchant->createToken($request->phone)->plainTextToken,
                    'company'=>$merchant->company,
                ];
                return $this->handelResponse($response,'You have been  Login Merchant successfully');
            }
            else{

                return response()->json( ['error'=>'Unauthorised'],401);
            }
    }


    public function index(){
        $data=Merchant::all();
        return view('user.merchant')->with('merchants',$data);
    }

    public function Delete_Merchant($id){
        Merchant::find($id)->delete();
        return redirect('/Merchants');
    }



    public function change_status($id,Request $request){
        $status= Merchant::find($id)->first();
        $status->status=$request->merchants_status;
        $status->save();
        return redirect('/Merchants');

    }

    public function commission($id){
        $merchant=Merchant::find($id);
        return view('merchant.commission')->with('data',$merchant);
    }

    public function Add_commission(Request $request){
        Merchant::find($request->id)->update([
            'minimum_shipping'=>$request->minimum_shipping,
            'maximum_shipping'=>$request->maximum_shipping,
            'commission'=>$request->commission,

        ]);

        return redirect('/Merchants');


    }

    public function money($id){
        $data=Merchant::with('orders')->find($id);
        $total=0;
        foreach ($data['orders'] as $order) {
            $total+=$order->total;
        }
        return view('merchant.moneys')->with('data',$data)->with('total',$total);

    }

}
