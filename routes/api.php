<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
////    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');


    Route::post('register',[AuthController::class,'registerUser']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::post('me',[AuthController::class,'me']);
});
