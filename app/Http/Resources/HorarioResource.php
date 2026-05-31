<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HorarioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_horario'  => $this->id_horario,
            'dia_semana'  => $this->dia_semana,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin'    => $this->hora_fin,
            'id_curso'    => $this->id_curso,
            'id_aula'     => $this->id_aula,

            // Relaciones eager-loaded
            'curso'       => new CursoResource($this->whenLoaded('curso')),
            'aula'        => new AulaResource($this->whenLoaded('aula')),

            'created_at'  => $this->created_at?->toDateTimeString(),
            'updated_at'  => $this->updated_at?->toDateTimeString(),
        ];
    }
}
