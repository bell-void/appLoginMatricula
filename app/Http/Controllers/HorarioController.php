<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Curso;
use App\Models\Aula;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $horarios = Horario::with(['curso', 'aula'])->paginate(10);
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $cursos = Curso::all();
        $aulas = Aula::all();
        return view('horarios.create', compact('cursos', 'aulas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_curso' => 'required|exists:cursos,id_curso',
            'dia_semana' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'id_aula' => 'required|exists:aulas,id_aula',
        ]);

        Horario::create($validated);
        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente');
    }

    public function show($id)
    {
        $horario = Horario::with(['curso', 'aula'])->findOrFail($id);
        return view('horarios.show', compact('horario'));
    }

    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $cursos = Curso::all();
        $aulas = Aula::all();
        return view('horarios.edit', compact('horario', 'cursos', 'aulas'));
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);

        $validated = $request->validate([
            'id_curso' => 'required|exists:cursos,id_curso',
            'dia_semana' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'id_aula' => 'required|exists:aulas,id_aula',
        ]);

        $horario->update($validated);
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente');
    }

    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente');
    }
}