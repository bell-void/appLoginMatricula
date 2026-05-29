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
            'fecha_matricula' => $this->fecha_matricula,
            'estado'          => $this->estado,
            'id_alumno'       => $this->id_alumno,
            'id_curso'        => $this->id_curso,
            'alumno'          => new AlumnoResource($this->whenLoaded('alumno')),
            'curso'           => new CursoResource($this->whenLoaded('curso')),
            'created_at'      => $this->created_at,
        ];
    }
}
