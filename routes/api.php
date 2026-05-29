<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\ProfesorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::apiResource('alumno', AlumnoController::class);
Route::apiResource('curso', CursoController::class);
Route::apiResource('horario', HorarioController::class);
Route::apiResource('matricula', MatriculaController::class);
Route::apiResource('profesor', ProfesorController::class);
