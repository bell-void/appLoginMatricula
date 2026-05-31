<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumnoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('alumno');
        return [
            'nombre'           => 'sometimes|string|max:100',
            'apellido'         => 'sometimes|string|max:100',
            'fecha_nacimiento' => 'sometimes|date',
            'email'            => 'sometimes|email|max:150|unique:alumnos,email,'.$id.',id_alumno',
            'telefono'         => 'nullable|string|max:20',
            'direccion'        => 'nullable|string|max:255',
        ];
    }
}
