<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\AulaController;  // ← AGREGAR

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Auth Laravel UI (login, register, logout)
|--------------------------------------------------------------------------
*/

Auth::routes();

/*
|--------------------------------------------------------------------------
| Home después de login normal
|--------------------------------------------------------------------------
*/

Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Google Login (Socialite)
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

/*
|--------------------------------------------------------------------------
| GitHub Login (Socialite)
|--------------------------------------------------------------------------
*/

Route::get('/auth/github/redirect', [GithubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/github/callback', [GithubController::class, 'callback'])->name('github.callback');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| RUTAS PARA LOS CRUD (protegidas por autenticación)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // RUTAS PARA ALUMNOS
    Route::resource('alumnos', AlumnoController::class);
    
    // RUTAS PARA CURSOS
    Route::resource('cursos', CursoController::class);
    
    // RUTAS PARA DOCENTES
    Route::resource('docentes', DocenteController::class);
    
    // RUTAS PARA HORARIOS
    Route::resource('horarios', HorarioController::class);
    
    // RUTAS PARA MATRÍCULAS
    Route::resource('matriculas', MatriculaController::class);
    
    // RUTAS PARA AULAS  ← AGREGAR
    Route::resource('aulas', AulaController::class);
    
    // Ruta adicional para calificar
    Route::get('/matriculas/{id}/calificar', [MatriculaController::class, 'calificar'])->name('matriculas.calificar');
    Route::post('/matriculas/{id}/calificar', [MatriculaController::class, 'guardarCalificacion'])->name('matriculas.guardarCalificacion');
    
});

/*
|--------------------------------------------------------------------------
| Ruta de fallback (404 personalizado)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return redirect('/');
});