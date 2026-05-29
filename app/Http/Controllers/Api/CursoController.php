<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use App\Http\Resources\CursoResource;

class CursoController extends Controller
{
    public function index()
    {
        return CursoResource::collection(
            Curso::with('profesor')->get()
        );
    }

    public function store(StoreCursoRequest $request)
    {
        $curso = Curso::create($request->validated());
        return new CursoResource($curso->load('profesor'));
    }

    public function show(string $id)
    {
        $curso = Curso::with('profesor')->findOrFail($id);
        return new CursoResource($curso);
    }

    public function update(UpdateCursoRequest $request, string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->validated());
        return new CursoResource($curso->load('profesor'));
    }

    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return response()->json([
            'message' => 'Curso eliminado correctamente'
        ]);
    }
}
