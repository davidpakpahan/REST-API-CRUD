<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'create']);
Route::get('products/{productId}', [ProductController::class, 'show']);
// Route::put('products/{productId}', [ProductController::class, 'update']);
Route::post('products/{productId}', [ProductController::class, 'update']);
Route::delete('products/{productId}', [ProductController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
