<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aula;
use App\Http\Requests\StoreAulaRequest;
use App\Http\Requests\UpdateAulaRequest;
use App\Http\Resources\AulaResource;

class AulaController extends Controller
{
    /** GET /api/aula */
    public function index()
    {
        return AulaResource::collection(Aula::all());
    }

    /** POST /api/aula */
    public function store(StoreAulaRequest $request)
    {
        $aula = Aula::create($request->validated());
        return new AulaResource($aula);
    }

    /** GET /api/aula/{id} */
    public function show(string $id)
    {
        // Cargamos también los horarios asignados a esta aula
        $aula = Aula::with('horarios.curso')->findOrFail($id);
        return new AulaResource($aula);
    }

    /** PUT/PATCH /api/aula/{id} */
    public function update(UpdateAulaRequest $request, string $id)
    {
        $aula = Aula::findOrFail($id);
        $aula->update($request->validated());
        return new AulaResource($aula);
    }

    /** DELETE /api/aula/{id} */
    public function destroy(string $id)
    {
        $aula = Aula::findOrFail($id);
        $aula->delete();
        return response()->json([
            'message' => 'Aula eliminada correctamente',
        ], 200);
    }
}
