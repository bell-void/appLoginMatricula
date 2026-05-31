<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\AulaController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\PagoController;
use App\Http\Controllers\Api\ProfesorController;

// ── ALUMNOS ──────────────────────────────────────────────────
Route::apiResource('alumno', AlumnoController::class);

// ── AULAS ────────────────────────────────────────────────────
Route::apiResource('aula', AulaController::class);

// ── PROFESORES / DOCENTES ─────────────────────────────────────
Route::apiResource('profesor', ProfesorController::class);

// ── CURSOS ───────────────────────────────────────────────────
Route::apiResource('curso', CursoController::class);

// ── HORARIOS ─────────────────────────────────────────────────
Route::apiResource('horario', HorarioController::class);

// ── MATRÍCULAS ────────────────────────────────────────────────
Route::apiResource('matricula', MatriculaController::class);

// ── PAGOS ────────────────────────────────────────────────────
Route::apiResource('pago', PagoController::class);

// Ruta extra: todos los pagos de una matrícula específica
// GET /api/pago/por-matricula/{id_matricula}
Route::get('pago/por-matricula/{id_matricula}', [PagoController::class, 'porMatricula'])
     ->name('pago.por-matricula');
