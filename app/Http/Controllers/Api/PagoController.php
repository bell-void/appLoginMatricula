<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use App\Models\Matricula;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use App\Http\Resources\PagoResource;

class PagoController extends Controller
{
    /** GET /api/pago */
    public function index()
    {
        return PagoResource::collection(
            Pago::with('matricula.alumno')->get()
        );
    }

    /** POST /api/pago */
    public function store(StorePagoRequest $request)
    {
        // Verificamos que la matrícula exista antes de crear el pago
        Matricula::findOrFail($request->id_matricula);

        $pago = Pago::create($request->validated());
        return new PagoResource($pago->load('matricula.alumno'));
    }

    /** GET /api/pago/{id} */
    public function show(string $id)
    {
        $pago = Pago::with('matricula.alumno')->findOrFail($id);
        return new PagoResource($pago);
    }

    /** PUT/PATCH /api/pago/{id} */
    public function update(UpdatePagoRequest $request, string $id)
    {
        $pago = Pago::findOrFail($id);
        $pago->update($request->validated());
        return new PagoResource($pago->load('matricula.alumno'));
    }

    /** DELETE /api/pago/{id} */
    public function destroy(string $id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();
        return response()->json([
            'message' => 'Pago eliminado correctamente',
        ], 200);
    }

    /** GET /api/pago/por-matricula/{id_matricula}
     *  Endpoint extra: todos los pagos de una matrícula específica
     */
    public function porMatricula(string $id_matricula)
    {
        Matricula::findOrFail($id_matricula); // 404 si no existe

        $pagos = Pago::with('matricula.alumno')
                     ->where('id_matricula', $id_matricula)
                     ->get();

        return PagoResource::collection($pagos);
    }
}
