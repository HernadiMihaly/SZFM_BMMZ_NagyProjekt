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


Route::get('kerdoivek', 'App\Http\Controllers\KerdoivController@index');
//Route::middleware('auth:sanctum')->get('kerdoivek/{kerdoiv}', 'App\Http\Controllers\KerdoivController@show');
Route::get('kerdoivek/{kerdoiv}', 'App\Http\Controllers\KerdoivController@show');
Route::post('kerdoivek', 'App\Http\Controllers\KerdoivController@store');
Route::put('kerdoivek/{kerdoiv}', 'App\Http\Controllers\KerdoivController@update');
Route::delete('kerdoivek/{kerdoiv}', 'App\Http\Controllers\KerdoivController@delete');

Route::post('valaszokmentese', 'App\Http\Controllers\ValaszController@store');