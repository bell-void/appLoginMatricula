<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $matriculas = Matricula::with(['alumno', 'curso'])->paginate(10);
        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();
        return view('matriculas.create', compact('alumnos', 'cursos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_alumno' => 'required|exists:alumnos,id_alumno',
            'id_curso' => 'required|exists:cursos,id_curso',
            'fecha_matricula' => 'required|date',
            'estado' => 'required|string'
        ]);

        Matricula::create($validated);
        return redirect()->route('matriculas.index')->with('success', 'Matrícula creada exitosamente');
    }

    public function show($id)
    {
        $matricula = Matricula::with(['alumno', 'curso'])->findOrFail($id);
        return view('matriculas.show', compact('matricula'));
    }

    public function edit($id)
    {
        $matricula = Matricula::findOrFail($id);
        $alumnos = Alumno::all();
        $cursos = Curso::all();
        return view('matriculas.edit', compact('matricula', 'alumnos', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);

        $validated = $request->validate([
            'id_alumno' => 'required|exists:alumnos,id_alumno',
            'id_curso' => 'required|exists:cursos,id_curso',
            'fecha_matricula' => 'required|date',
            'estado' => 'required|string'
        ]);

        $matricula->update($validated);
        return redirect()->route('matriculas.index')->with('success', 'Matrícula actualizada exitosamente');
    }

    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();
        return redirect()->route('matriculas.index')->with('success', 'Matrícula eliminada exitosamente');
    }
}