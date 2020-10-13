<?php

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


Auth::routes();

Route::get('/logout-manual',function(){
    request()->session()->invalidate();
});

// Route::get('/{any}', [App\Http\Controllers\AppController::class, 'index'])->where('any','*');

// gets any route and sends to the app controller 

// Route::get('/{any}', 'AppController@index')->where('any','.*');
Route::get('/{any}',  'App\Http\Controllers\AppController@index')->where('any','.*');