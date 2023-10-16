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
        return redirect('/Vehicles');

    }

    public function get(){
        $vehicles=Vehicles::all();
        return $this->handelResponse($vehicles,'This is all the vehicle information');

    }

    public function index(){
        $data=Vehicles::all();
        return view('vehicles.index')->with('vehicles',$data);
    }

    public function Delete_Vehicle($id){
        Vehicles::find($id)->delete();
        return redirect('/Vehicles');
    }

    public function Create(){
       return view('vehicles.add');
    }

}
