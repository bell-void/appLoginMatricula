<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AulaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_aula'     => $this->id_aula,
            'nombre_aula' => $this->nombre_aula,
            'capacidad'   => $this->capacidad,
            'ubicacion'   => $this->ubicacion,

            // Si se cargaron horarios con ->with('horarios')
            'horarios'    => HorarioResource::collection(
                                $this->whenLoaded('horarios')),

            'created_at'  => $this->created_at?->toDateTimeString(),
            'updated_at'  => $this->updated_at?->toDateTimeString(),
        ];
    }
}
