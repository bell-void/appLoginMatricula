<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aulas = Aula::paginate(10);
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_aula' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'ubicacion' => 'nullable|string|max:255'
        ]);

        Aula::create($validated);
        return redirect()->route('aulas.index')->with('success', 'Aula creada exitosamente');
    }

    public function show($id)
    {
        $aula = Aula::findOrFail($id);
        return view('aulas.show', compact('aula'));
    }

    public function edit($id)
    {
        $aula = Aula::findOrFail($id);
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, $id)
    {
        $aula = Aula::findOrFail($id);

        $validated = $request->validate([
            'nombre_aula' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'ubicacion' => 'nullable|string|max:255'
        ]);

        $aula->update($validated);
        return redirect()->route('aulas.index')->with('success', 'Aula actualizada exitosamente');
    }

    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada exitosamente');
    }
}