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

Route::group(['prefix' => ' user'], function() {
    Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
});


Route::group(['prefix' => ' emps'], function() {
    Route::post('/store', [\App\Http\Controllers\Api\EmployeeController::class, 'store'])
        ->middleware('auth:api');
    Route::post('/login', [\App\Http\Controllers\Api\EmployeeController::class, 'index']);
});
