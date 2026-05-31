<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatriculaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_matricula'    => $this->id_matricula,
            'fecha_matricula' => $this->fecha_matricula?->toDateString(),
            'estado'          => $this->estado,
            'id_alumno'       => $this->id_alumno,
            'id_curso'        => $this->id_curso,

            // Relaciones
            'alumno'          => new AlumnoResource($this->whenLoaded('alumno')),
            'curso'           => new CursoResource($this->whenLoaded('curso')),
            'pagos'           => PagoResource::collection($this->whenLoaded('pagos')),

            'created_at'      => $this->created_at?->toDateTimeString(),
            'updated_at'      => $this->updated_at?->toDateTimeString(),
        ];
    }
}
