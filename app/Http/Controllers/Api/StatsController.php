<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
    {
        return response()->json([
            'alumnos' => 0,
            'cursos' => 0,
            'matriculas' => 0,
            'pagos' => 0,
            'message' => 'Stats funcionando correctamente'
        ]);
    }
}