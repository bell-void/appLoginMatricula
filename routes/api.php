<?php

use Illuminate\Support\Facades\Route;

// ── CONTROLLERS CRUD ─────────────────────────────────────────
use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\AulaController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\PagoController;
use App\Http\Controllers\Api\ProfesorController;

// ── CHATBOT ───────────────────────────────────────────────────
use App\Http\Controllers\ChatbotController;

// ──────────────────────────────────────────────────────────────
// ALUMNOS
Route::apiResource('alumno', AlumnoController::class);

// AULAS
Route::apiResource('aula', AulaController::class);

// PROFESORES
Route::apiResource('profesor', ProfesorController::class);

// CURSOS
Route::apiResource('curso', CursoController::class);

// HORARIOS
Route::apiResource('horario', HorarioController::class);

// MATRÍCULAS
Route::apiResource('matricula', MatriculaController::class);

// PAGOS
Route::apiResource('pago', PagoController::class);

// Pago por matrícula
Route::get('pago/por-matricula/{id_matricula}', [PagoController::class, 'porMatricula'])
     ->name('pago.por-matricula');


// 🤖 CHATBOT IA (GROQ)
Route::post('/chat', [ChatbotController::class, 'chat']);