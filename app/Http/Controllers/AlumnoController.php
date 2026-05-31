<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $alumnos = Alumno::paginate(10);
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',  // ← CORREGIDO: apellido (singular)
            'fecha_nacimiento' => 'required|date',
            // ❌ ELIMINAR 'dni' (no existe en tabla)
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'email' => 'required|email|unique:alumnos,email',
            // ❌ ELIMINAR 'estado_matricula' (no existe en tabla)
        ]);

        Alumno::create($validated);
        
        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno creado exitosamente');
    }

    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.show', compact('alumno'));
    }

    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',  // ← CORREGIDO: apellido
            'fecha_nacimiento' => 'required|date',
            // ❌ ELIMINAR 'dni'
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'email' => 'required|email|unique:alumnos,email,' . $id . ',id_alumno',
            // ❌ ELIMINAR 'estado_matricula'
        ]);

        $alumno->update($validated);
        
        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado exitosamente');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        
        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado exitosamente');
    }
}