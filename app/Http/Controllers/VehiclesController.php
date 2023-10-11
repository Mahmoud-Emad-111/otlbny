<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiclesController extends Controller
{
    //
    public function store(Request $request){
        $validate=Validator::make($request->all(),[
        'vehicle_name'=> 'required',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        }
        $vehicle=Vehicles::create([
            'vehicle'=>$request->vehicle_name,
        ]);
        $res=[
            'vehicle name'=>$vehicle->vehicle,
        ];
        return $this->handelResponse($res,'The vehicle has been added successfully');

    }
    
    public function get(){
        $vehicles=Vehicles::all();
        return $this->handelResponse($vehicles,'This is all the vehicle information');

    }
}
