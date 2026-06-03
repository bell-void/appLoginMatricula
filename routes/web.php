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
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ReporteController;

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

// 👇 NUEVO: Sobrescribir las rutas GET de login y register para usar la vista unificada con flip
Route::get('/login', function () {
    return view('auth.login-register');
})->name('login');

Route::get('/register', function () {
    return view('auth.login-register');
})->name('register');

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

Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| CHATBOT
|--------------------------------------------------------------------------
*/

Route::post('/chatbot/send', [ChatbotController::class, 'chat'])->name('chatbot.send');

/*
|--------------------------------------------------------------------------
| RUTAS PARA LOS CRUD (protegidas por autenticación)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::resource('alumnos', AlumnoController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('matriculas', MatriculaController::class);
    Route::resource('aulas', AulaController::class);
    Route::get('/matriculas/{id}/calificar', [MatriculaController::class, 'calificar'])->name('matriculas.calificar');
    Route::post('/matriculas/{id}/calificar', [MatriculaController::class, 'guardarCalificacion'])->name('matriculas.guardarCalificacion');
});

/*
|--------------------------------------------------------------------------
| RUTAS PARA REPORTES PDF
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/pdf/alumnos', [ReporteController::class, 'pdfAlumnos'])->name('pdf.alumnos');
    Route::get('/pdf/cursos', [ReporteController::class, 'pdfCursos'])->name('pdf.cursos');
    Route::get('/pdf/docentes', [ReporteController::class, 'pdfDocentes'])->name('pdf.docentes');
    Route::get('/pdf/matriculas', [ReporteController::class, 'pdfMatriculas'])->name('pdf.matriculas');
    Route::get('/pdf/horarios', [ReporteController::class, 'pdfHorarios'])->name('pdf.horarios');
    Route::get('/pdf/aulas', [ReporteController::class, 'pdfAulas'])->name('pdf.aulas');
});

/*
|--------------------------------------------------------------------------
| Ruta de fallback (404 personalizado)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return redirect('/');
});