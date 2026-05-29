<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Http\Resources\AlumnoResource;

class AlumnoController extends Controller
{
    public function index()
    {
        return AlumnoResource::collection(Alumno::all());
    }

    public function store(StoreAlumnoRequest $request)
    {
        $alumno = Alumno::create($request->validated());
        return new AlumnoResource($alumno);
    }

    public function show(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        return new AlumnoResource($alumno);
    }

    public function update(UpdateAlumnoRequest $request, string $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->validated());
        return new AlumnoResource($alumno);
    }

    public function destroy(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        return response()->json([
            'message' => 'Alumno eliminado correctamente'
        ]);
    }
}
