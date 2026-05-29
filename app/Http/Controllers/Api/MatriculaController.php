<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matricula;
use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Http\Resources\MatriculaResource;

class MatriculaController extends Controller
{
    public function index()
    {
        return MatriculaResource::collection(
            Matricula::with(['alumno','curso'])->get()
        );
    }

    public function store(StoreMatriculaRequest $request)
    {
        $matricula = Matricula::create($request->validated());
        return new MatriculaResource(
            $matricula->load(['alumno','curso'])
        );
    }

    public function show(string $id)
    {
        $matricula = Matricula::with(['alumno','curso'])
                              ->findOrFail($id);
        return new MatriculaResource($matricula);
    }

    public function update(UpdateMatriculaRequest $request, string $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->update($request->validated());
        return new MatriculaResource(
            $matricula->load(['alumno','curso'])
        );
    }

    public function destroy(string $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();
        return response()->json([
            'message' => 'Matrícula eliminada correctamente'
        ]);
    }
}
