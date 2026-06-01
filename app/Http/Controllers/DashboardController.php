<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Matricula;
use App\Models\Horario;
use App\Models\Aula;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Estadísticas básicas
        $totalAlumnos = Alumno::count();
        $totalCursos = Curso::count();
        $totalDocentes = Docente::count();
        $totalMatriculas = Matricula::count();
        $totalHorarios = Horario::count();
        $totalAulas = Aula::count();

        // Datos para el gráfico: Top 5 cursos con más matrículas
        $topCursos = Curso::withCount('matriculas')
                        ->orderBy('matriculas_count', 'desc')
                        ->take(5)
                        ->get();

        $cursosLabels = $topCursos->pluck('nombre_curso'); // Ajusta según tu campo
        $cursosData = $topCursos->pluck('matriculas_count');

        if ($cursosLabels->isEmpty()) {
            $cursosLabels = ['Sin datos'];
            $cursosData = [0];
        }

        // Últimas 5 matrículas con sus relaciones (alumno y curso)
        $ultimasMatriculas = Matricula::with(['alumno', 'curso'])
            ->orderBy('fecha_matricula', 'desc')   // o 'created_at' si usas timestamps
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalAlumnos', 'totalCursos', 'totalDocentes', 'totalMatriculas',
            'totalHorarios', 'totalAulas', 'cursosLabels', 'cursosData',
            'ultimasMatriculas'
        ));
    }
}