<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    ###########################  SING IN USER  #################################
    public function Register(UserRequest $request){
       $user= User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'national_id'=>$request->national_id,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        $res=[
            'name'=>$user->name,
            'token'=>$user->createToken($request->phone)->plainTextToken,
        ];
        return $this->handelResponse($res,'You have been registered successfully');
    }

    ###########################  Login USER  #################################

    public function Login(Request $request){
        $validate=Validator::make($request->all(),[
            'phone'=> 'required|max:11|min:11',
            'password'=> 'required',
           ]);
            if($validate->fails()){
                return response()->json($validate->errors());
            }

            if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){
                $user = Auth::user();
                $response['token'] =  $user->createToken($request->phone)->plainTextToken;
                $response['name'] =  $user->name;
                return $this->handelResponse($response,'You have been registered successfully');
            }
            else{

                return response()->json( ['error'=>'Unauthorised'],401);
            }
    }

    
}
