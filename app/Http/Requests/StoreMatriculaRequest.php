<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreMatriculaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'fecha_matricula' => 'required|date',
            'estado'          => 'sometimes|in:Activo,Retirado,Pendiente',
            'id_alumno'       => 'required|exists:alumnos,id_alumno',
            'id_curso'        => 'required|exists:cursos,id_curso',
        ];
    }
}
