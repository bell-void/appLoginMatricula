<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docente;  // ← AGREGAR
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cursos = Curso::with('profesor')->paginate(10);  // ← AGREGAR with
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $docentes = Docente::all();  // ← AGREGAR
        return view('cursos.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_curso' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'creditos' => 'required|integer|min:1|max:10',
            'id_docente' => 'required|exists:docentes,id_docente',  // ← AGREGAR
        ]);

        Curso::create($validated);
        return redirect()->route('cursos.index')->with('success', 'Curso creado exitosamente');
    }

    public function show($id)
    {
        $curso = Curso::with('profesor')->findOrFail($id);  // ← AGREGAR with
        return view('cursos.show', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $docentes = Docente::all();  // ← AGREGAR
        return view('cursos.edit', compact('curso', 'docentes'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $validated = $request->validate([
            'nombre_curso' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'creditos' => 'required|integer|min:1|max:10',
            'id_docente' => 'required|exists:docentes,id_docente',  // ← AGREGAR
        ]);

        $curso->update($validated);
        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente');
    }
}