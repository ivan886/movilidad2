<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|https://www.youtube.com/watch?v=6yT0N0UH9KQ
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/viajes','ViajeControllerWeb@numViajesImei');
Route::post('/viajes/imei','ViajeControllerWeb@viajesImei');
Route::post('/viajes/mapa','ViajeControllerWeb@mapa');
