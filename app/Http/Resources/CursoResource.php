<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_curso'     => $this->id_curso,
            'nombre_curso' => $this->nombre_curso,
            'descripcion'  => $this->descripcion,
            'creditos'     => $this->creditos,
            'id_docente'   => $this->id_docente,
            'profesor'     => new ProfesorResource($this->whenLoaded('profesor')),
            'created_at'   => $this->created_at,
        ];
    }
}
