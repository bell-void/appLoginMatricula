<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCursoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre_curso' => 'sometimes|string|max:150',
            'descripcion'  => 'nullable|string',
            'creditos'     => 'sometimes|integer|min:1',
            'id_docente'   => 'sometimes|exists:docentes,id_docente',
        ];
    }
}
