<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfesorRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('profesor');
        return [
            'nombre'       => 'sometimes|string|max:100',
            'apellido'     => 'sometimes|string|max:100',
            'especialidad' => 'nullable|string|max:100',
            'email'        => 'sometimes|email|max:150|unique:docentes,email,'.$id.',id_docente',
            'telefono'     => 'nullable|string|max:20',
        ];
    }
}
