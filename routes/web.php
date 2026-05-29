<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Auth Laravel UI (login, register, logout)
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Google Login (Socialite)
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

/*
|--------------------------------------------------------------------------
| Dashboard protegido
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); // <--- ESTO ES LO QUE CORRIGE EL ERROR