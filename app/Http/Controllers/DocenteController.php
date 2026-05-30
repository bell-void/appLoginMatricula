<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $docentes = Docente::paginate(10);
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',      // ← singular
            'especialidad' => 'nullable|string|max:255',
            'email' => 'required|email|unique:docentes,email',
            'telefono' => 'nullable|string|max:20',
        ]);

        Docente::create($validated);
        return redirect()->route('docentes.index')->with('success', 'Docente creado exitosamente');
    }

    public function show($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.show', compact('docente'));
    }

    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'nullable|string|max:255',
            'email' => 'required|email|unique:docentes,email,' . $id . ',id_docente',
            'telefono' => 'nullable|string|max:20',
        ]);

        $docente->update($validated);
        return redirect()->route('docentes.index')->with('success', 'Docente actualizado exitosamente');
    }

    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();
        return redirect()->route('docentes.index')->with('success', 'Docente eliminado exitosamente');
    }
}