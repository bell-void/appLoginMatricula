<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreCursoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre_curso' => 'required|string|max:150',
            'descripcion'  => 'nullable|string',
            'creditos'     => 'required|integer|min:1',
            'id_docente'   => 'required|exists:docentes,id_docente',
        ];
    }
}
