<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//user routes
Route::get('users',[UserController::class,'index']);
Route::get('user/{id}',[UserController::class,'show']);
Route::post('user/register',[UserController::class,'register']);
Route::put('user/update/{id}',[UserController::class,'updateUser']);
Route::delete('user/delete/{id}',[UserController::class,'deleteUser']);
