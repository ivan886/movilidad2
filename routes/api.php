<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



        Route::post('/viajes/imei_fecha','ViajeController@viajesImeiFecha');
        
        Route::post('/viajes/info','ViajeController@info');
        
        Route::get('viajes','ViajeController@index');
        Route::delete('viajes','ViajeController@deleteAll');
        Route::post('viajes','ViajeController@store');
        
        Route::get('/viajes/1', function () {
            return new ViajeResource(Viaje::where('imei','1')->get());
        });  
