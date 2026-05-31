<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfesorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_docente'      => $this->id_docente,
            'nombre'          => $this->nombre,
            'apellido'        => $this->apellido,
            'nombre_completo' => "{$this->nombre} {$this->apellido}",
            'especialidad'    => $this->especialidad,
            'email'           => $this->email,
            'telefono'        => $this->telefono,

            // Cursos del docente si se cargaron
            'cursos'          => CursoResource::collection($this->whenLoaded('cursos')),

            'created_at'      => $this->created_at?->toDateTimeString(),
            'updated_at'      => $this->updated_at?->toDateTimeString(),
        ];
    }
}
