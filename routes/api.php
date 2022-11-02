<?php

namespace App\Http\Controllers;



use App\Http\Controllers\api\EmployeeController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\AuthController;

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

//Route::apiResource('employee',EmployeeController::class);

Route::apiResource('employee',EmployeeController::class);
Route::apiResource('supplier',SupplierController::class);
