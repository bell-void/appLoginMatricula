<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
