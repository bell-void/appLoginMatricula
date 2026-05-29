<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use App\Http\Requests\StoreHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Http\Resources\HorarioResource;

class HorarioController extends Controller
{
    public function index()
    {
        return HorarioResource::collection(
            Horario::with('curso')->get()
        );
    }

    public function store(StoreHorarioRequest $request)
    {
        $horario = Horario::create($request->validated());
        return new HorarioResource($horario->load('curso'));
    }

    public function show(string $id)
    {
        $horario = Horario::with('curso')->findOrFail($id);
        return new HorarioResource($horario);
    }

    public function update(UpdateHorarioRequest $request, string $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->update($request->validated());
        return new HorarioResource($horario->load('curso'));
    }

    public function destroy(string $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return response()->json([
            'message' => 'Horario eliminado correctamente'
        ]);
    }
}
