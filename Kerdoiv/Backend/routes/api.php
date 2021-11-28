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
Route::middleware('auth:sanctum')->post('kerdoivek', 'App\Http\Controllers\KerdoivController@store');
Route::middleware('auth:sanctum')->put('kerdoivek/{kerdoiv}', 'App\Http\Controllers\KerdoivController@update');
Route::middleware('auth:sanctum')->delete('kerdoivek/{kerdoiv}', 'App\Http\Controllers\KerdoivController@delete');

Route::post('login', 'App\Http\Controllers\LoginController@login');
Route::post('register', 'App\Http\Controllers\LoginController@register');

Route::post('valaszokmentese', 'App\Http\Controllers\ValaszController@store');
Route::/*middleware('auth:sanctum')->*/get('valaszok/{kerdoiv}', 'App\Http\Controllers\ValaszController@list');