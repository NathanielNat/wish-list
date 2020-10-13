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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function() {
   Route::get('/wishes','App\Http\Controllers\WishController@index');
   Route::post('/wishes','App\Http\Controllers\WishController@store');
   Route::get('/wishes/{wish}','App\Http\Controllers\WishController@show');
   Route::patch('/wishes/{wish}','App\Http\Controllers\WishController@update');
   Route::delete('/wishes/{wish}','App\Http\Controllers\WishController@destroy');
});


//    Route::get('/wishes','App\Http\Controllers\WishController@index');
//    Route::post('/wishes','App\Http\Controllers\WishController@store');
//    Route::get('/wishes/{wish}','App\Http\Controllers\WishController@show');
//    Route::patch('/wishes/{wish}','App\Http\Controllers\WishController@update');
//    Route::delete('/wishes/{wish}','App\Http\Controllers\WishController@destroy');

