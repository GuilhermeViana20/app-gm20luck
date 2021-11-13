<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;

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

Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'App\Http\Controllers\ProductsController@showAll');
        Route::get('/{id}', 'App\Http\Controllers\ProductsController@showById');
        Route::post('/create', 'App\Http\Controllers\ProductsController@create');
        Route::post('/update/{id}', 'App\Http\Controllers\ProductsController@update');
        Route::delete('/delete/{id}', 'App\Http\Controllers\ProductsController@delete');
    });

});