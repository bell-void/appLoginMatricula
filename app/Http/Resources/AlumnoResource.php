<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumnoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_alumno'        => $this->id_alumno,
            'nombre'           => $this->nombre,
            'apellido'         => $this->apellido,
            'nombre_completo'  => "{$this->nombre} {$this->apellido}",
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'email'            => $this->email,
            'telefono'         => $this->telefono,
            'direccion'        => $this->direccion,

            // Matrículas del alumno
            'matriculas'       => MatriculaResource::collection(
                                    $this->whenLoaded('matriculas')),

            'created_at'       => $this->created_at?->toDateTimeString(),
            'updated_at'       => $this->updated_at?->toDateTimeString(),
        ];
    }
}
