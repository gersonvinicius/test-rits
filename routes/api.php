<?php

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

Route::apiResource('clients','App\Http\Controllers\api\ClientController');
Route::get('orders/{client}','App\Http\Controllers\api\OrderController@index');
Route::get('orders/{client}/show/{order}','App\Http\Controllers\api\OrderController@show');
Route::post('orders/{client}/store','App\Http\Controllers\api\OrderController@store');
Route::get('orders/{client}/delete/{order}','App\Http\Controllers\api\OrderController@destroy');
