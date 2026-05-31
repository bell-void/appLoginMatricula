<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PagoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_pago'      => $this->id_pago,
            'monto'        => number_format($this->monto, 2),
            'fecha_pago'   => $this->fecha_pago?->toDateString(),
            'metodo_pago'  => $this->metodo_pago,
            'estado_pago'  => $this->estado_pago,
            'id_matricula' => $this->id_matricula,

            // Datos completos de la matrícula si se cargó con ->with('matricula')
            'matricula'    => new MatriculaResource(
                                $this->whenLoaded('matricula')
                              ),

            'created_at'   => $this->created_at?->toDateTimeString(),
            'updated_at'   => $this->updated_at?->toDateTimeString(),
        ];
    }
}
