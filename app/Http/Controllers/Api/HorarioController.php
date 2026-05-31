<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use App\Models\Aula;
use App\Models\Curso;
use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Http\Resources\HorarioResource;

class HorarioController extends Controller
{
    /** GET /api/horario */
    public function index()
    {
        return HorarioResource::collection(
            Horario::with(['curso.profesor', 'aula'])->get()
        );
    }

    /** POST /api/horario */
    public function store(StoreHorarioRequest $request)
    {
        // Validamos que el aula y el curso existan
        Aula::findOrFail($request->id_aula);
        Curso::findOrFail($request->id_curso);

        $horario = Horario::create($request->validated());
        return new HorarioResource(
            $horario->load(['curso.profesor', 'aula'])
        );
    }

    /** GET /api/horario/{id} */
    public function show(string $id)
    {
        $horario = Horario::with(['curso.profesor', 'aula'])->findOrFail($id);
        return new HorarioResource($horario);
    }

    /** PUT/PATCH /api/horario/{id} */
    public function update(UpdateHorarioRequest $request, string $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->update($request->validated());
        return new HorarioResource(
            $horario->load(['curso.profesor', 'aula'])
        );
    }

    /** DELETE /api/horario/{id} */
    public function destroy(string $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return response()->json([
            'message' => 'Horario eliminado correctamente',
        ], 200);
    }
}
