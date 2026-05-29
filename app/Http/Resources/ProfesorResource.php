<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfesorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id_docente'   => $this->id_docente,
            'nombre'       => $this->nombre,
            'apellido'     => $this->apellido,
            'especialidad' => $this->especialidad,
            'email'        => $this->email,
            'telefono'     => $this->telefono,
            'created_at'   => $this->created_at,
        ];
    }
}
