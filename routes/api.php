<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\categoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//user routes
Route::get('admins',[UserController::class,'allAdmins']); //users with role admin
Route::get('users',[UserController::class,'allUsers']); //users with role user
Route::get('user/{id}',[UserController::class,'show']);
Route::post('user/register',[UserController::class,'register']);
Route::put('user/update/{id}',[UserController::class,'updateUser']);
Route::delete('user/delete/{id}',[UserController::class,'deleteUser']);

//login route
Route::post('user/login',[LoginController::class,'login'])->middleware('guest:sanctum');
//logout route
Route::post('user/logout',[LogoutController::class,'logout'])->middleware('auth:sanctum');

//category routes
Route::get('categories',[categoryController::class,'allCategories']);
Route::get('category/{id}',[categoryController::class,'oneCategory']);
Route::post('category/store',[categoryController::class,'storeCategory']);
Route::put('category/update/{id}',[categoryController::class,'updateCategory']);
Route::delete('category/delete/{id}',[categoryController::class,'deleteCategory']);

//product routes
Route::get('products',[ProductController::class,'allProducts']);
Route::get('product/{id}',[ProductController::class,'oneProduct']);
Route::post('product/store',[ProductController::class,'storeProduct']);
Route::put('product/update/{id}',[ProductController::class,'updateProduct']);
Route::delete('product/delete/{id}',[ProductController::class,'deleteProduct']);