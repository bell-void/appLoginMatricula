<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMatriculaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'fecha_matricula' => 'sometimes|date',
            'estado'          => 'sometimes|in:Activo,Retirado,Pendiente',
            'id_alumno'       => 'sometimes|exists:alumnos,id_alumno',
            'id_curso'        => 'sometimes|exists:cursos,id_curso',
        ];
    }
}
