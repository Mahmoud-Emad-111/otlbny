<?php

use App\Http\Controllers\Auth\DeliveryController;
use App\Http\Controllers\Auth\MerchantController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index']);

Route::controller(UserController::class)->group(function(){
    Route::get('/Client','index');
    Route::post('Delete-user/{id}','Delete_User')->name('Delete-user');

});

Route::controller(DeliveryController::class)->group(function(){
    Route::get('/Delivery','index');
    Route::post('Delete-delivery/{id}','Delete_Delivery')->name('Delete-delivery');
    Route::post('Change-status/{id}','change_status')->name('Change-status');

});

Route::controller(MerchantController::class)->group(function(){
    Route::get('/Merchants','index');
    Route::post('Delete-merchants/{id}','Delete_Merchant')->name('Delete-merchant');

});

Route::controller(VehiclesController::class)->group(function(){
    Route::get('/Vehicles','index');
    Route::get('/Vehicle_Add','Create');
    Route::post('/vehicle_instert','Store');
    Route::post('Delete-vehicle/{id}','Delete_Vehicle')->name('Delete-vehicle');

});

Route::controller(OrderController::class)->group(function(){
    Route::get('/Order','index');
    Route::get('/Order_Pending','order_pending');
    Route::get('/Order_Delivery','order_delivery');
    Route::get('/Order_Complete','order_complete');
    Route::post('Delete-order/{id}','Delete_Order')->name('Delete-order');

});
