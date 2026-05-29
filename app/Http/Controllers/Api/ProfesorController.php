<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use App\Http\Requests\StoreProfesorRequest;
use App\Http\Requests\UpdateProfesorRequest;
use App\Http\Resources\ProfesorResource;

class ProfesorController extends Controller
{
    public function index()
    {
        return ProfesorResource::collection(Profesor::all());
    }

    public function store(StoreProfesorRequest $request)
    {
        $profesor = Profesor::create($request->validated());
        return new ProfesorResource($profesor);
    }

    public function show(string $id)
    {
        $profesor = Profesor::findOrFail($id);
        return new ProfesorResource($profesor);
    }

    public function update(UpdateProfesorRequest $request, string $id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->update($request->validated());
        return new ProfesorResource($profesor);
    }

    public function destroy(string $id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->delete();
        return response()->json([
            'message' => 'Profesor eliminado correctamente'
        ]);
    }
}
