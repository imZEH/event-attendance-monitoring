<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function (){
    Route::apiResource('userdetails', UserController::class);
    Route::apiResource('events', EventController::class);
});

Route::post('login', [AuthController::class, 'login']);