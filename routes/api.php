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

Route::post('/create-product',[App\Http\Controllers\ProductController::class,'saveProduct']);

Route::get('/all-products',[App\Http\Controllers\ProductController::class,'getProducts']);

Route::get('/delete-product/{id}',[App\Http\Controllers\ProductController::class,'deleteProduct']);

Route::post('/update-product/{id}',[App\Http\Controllers\ProductController::class,'updateProduct']);