<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Matricula;
use App\Models\Horario;
use App\Models\Aula;

class ReporteController extends Controller
{
    public function pdfAlumnos()
    {
        $alumnos = Alumno::all();
        $fecha = now()->format('d/m/Y H:i:s');
        $pdf = Pdf::loadView('pdf.alumnos', compact('alumnos', 'fecha'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('reporte_alumnos_' . now()->format('Ymd_His') . '.pdf');
    }

    public function pdfCursos()
    {
        $cursos = Curso::all();
        $totalCreditos = Curso::sum('creditos');
        $fecha = now()->format('d/m/Y H:i:s');
        $pdf = Pdf::loadView('pdf.cursos', compact('cursos', 'totalCreditos', 'fecha'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('reporte_cursos_' . now()->format('Ymd_His') . '.pdf');
    }

    public function pdfDocentes()
    {
        $docentes = Docente::all();
        $fecha = now()->format('d/m/Y H:i:s');
        $pdf = Pdf::loadView('pdf.docentes', compact('docentes', 'fecha'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('reporte_docentes_' . now()->format('Ymd_His') . '.pdf');
    }

    public function pdfMatriculas()
    {
        $matriculas = Matricula::with(['alumno', 'curso'])->get();
        $fecha = now()->format('d/m/Y H:i:s');
        $pdf = Pdf::loadView('pdf.matriculas', compact('matriculas', 'fecha'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('reporte_matriculas_' . now()->format('Ymd_His') . '.pdf');
    }

    public function pdfHorarios()
    {
        $horarios = Horario::with(['curso', 'aula'])->get();
        $fecha = now()->format('d/m/Y H:i:s');
        $pdf = Pdf::loadView('pdf.horarios', compact('horarios', 'fecha'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('reporte_horarios_' . now()->format('Ymd_His') . '.pdf');
    }

    public function pdfAulas()
    {
        $aulas = Aula::all();
        $fecha = now()->format('d/m/Y H:i:s');
        $pdf = Pdf::loadView('pdf.aulas', compact('aulas', 'fecha'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('reporte_aulas_' . now()->format('Ymd_His') . '.pdf');
    }
}