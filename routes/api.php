<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// public route
Route::get('products', "ProductController@index");
Route::get('products/{id}', "ProductController@show");
Route::post('register', "AuthController@register");
Route::post('login', "AuthController@login");

// private route
Route::group(["middleware"=>['auth:sanctum'] ] , function(){
    Route::post('products', "ProductController@store");
    Route::put('products/{id}', "ProductController@update");
    Route::delete('products/{id}', "ProductController@destroy");
    Route::post('/logout', "AuthController@logout");

});
