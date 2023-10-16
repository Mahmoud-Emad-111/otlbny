<?php

// use App\Http\Controllers\UserController;

// use App\Http\Controllers\Api\Auth\UserController;
// use App\Http\Controllers\UserController;

use App\Http\Controllers\Auth\DeliveryController;
use App\Http\Controllers\Auth\MerchantController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\MerchantDeliveryController;
use App\Http\Controllers\MerchantOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceOfferController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('client')->controller(UserController::class)->group(function(){
    Route::post('Register','Register');
    Route::post('Login','Login');
});

Route::prefix('delivery')->controller(DeliveryController::class)->group(function(){
    Route::post('Register','Register');
    Route::post('Login','Login');
    Route::post('order_complete','order_complete')->middleware('auth:sanctum');
});

Route::prefix('merchant')->controller(MerchantController::class)->group(function(){
    Route::post('Register','Register');
    Route::post('Login','Login');
});

Route::prefix('vehicle')->controller(VehiclesController::class)->group(function(){
    Route::post('insert','Store');
    Route::get('get','get');
});

Route::prefix('order')->middleware('auth:sanctum')->controller(OrderController::class)->group(function(){
    Route::post('insert','Store');
    Route::get('get','get');
});

Route::prefix('merchant_order')->middleware('auth:sanctum')->controller(MerchantOrderController::class)->group(function(){
    Route::post('insert','Store');
    Route::get('get','get');
});

Route::prefix('price_offer')->middleware('auth:sanctum')->controller(PriceOfferController::class)->group(function(){
    Route::post('insert','Store');
    Route::get('get','get');
    Route::post('approved','approved');
    Route::post('Rejection','Rejection');
});

Route::prefix('merchant_delivery')->middleware('auth:sanctum')->controller(MerchantDeliveryController::class)->group(function(){
    Route::post('approved','approved');
    // Route::post('Rejection','Rejection');
});


