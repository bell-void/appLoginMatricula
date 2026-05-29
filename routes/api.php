<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\ProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// 🔐 Sanctum (recomendado)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// 🔐 Basic Auth
Route::middleware('auth.basic')->get('/user-basic', function (Request $request) {
    return $request->user();
});

// 📦 Recursos públicos (sin auth por ahora, para probar en Postman)
Route::apiResource('categories', CategoriesController::class);
Route::apiResource('clients',    ClientsController::class);
Route::apiResource('orders',     OrdersController::class);
Route::apiResource('products',   ProductsController::class);