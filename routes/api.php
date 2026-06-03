<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\AulaController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\PagoController;
use App\Http\Controllers\Api\ProfesorController;
use App\Http\Controllers\Api\StatsController;
use App\Http\Controllers\ChatbotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// ==============================================
// ALUMNOS
// ==============================================
Route::apiResource('alumno', AlumnoController::class);
Route::get('alumno/select', [AlumnoController::class, 'select'])->name('alumno.select');

// ==============================================
// AULAS
// ==============================================
Route::apiResource('aula', AulaController::class);
Route::get('aula/select', [AulaController::class, 'select'])->name('aula.select');

// ==============================================
// PROFESORES / DOCENTES
// ==============================================
Route::apiResource('profesor', ProfesorController::class);
Route::get('profesor/select', [ProfesorController::class, 'select'])->name('profesor.select');

// ==============================================
// CURSOS
// ==============================================
Route::apiResource('curso', CursoController::class);
Route::get('curso/select', [CursoController::class, 'select'])->name('curso.select');

// ==============================================
// HORARIOS
// ==============================================
Route::apiResource('horario', HorarioController::class);
Route::get('horario/select', [HorarioController::class, 'select'])->name('horario.select');

// ==============================================
// MATRÍCULAS
// ==============================================
Route::apiResource('matricula', MatriculaController::class);
Route::get('matricula/select', [MatriculaController::class, 'select'])->name('matricula.select');

// ==============================================
// PAGOS
// ==============================================
Route::apiResource('pago', PagoController::class);
Route::get('pago/por-matricula/{id_matricula}', [PagoController::class, 'porMatricula'])
     ->name('pago.por-matricula');

// ==============================================
// ESTADÍSTICAS PARA EL DASHBOARD
// ==============================================
Route::get('/stats', [StatsController::class, 'index'])->name('stats.index');

// ==============================================
// CHATBOT IA (GROQ)
// ==============================================
Route::post('/chat', [ChatbotController::class, 'chat'])->name('chatbot.chat');