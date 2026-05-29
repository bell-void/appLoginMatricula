<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre'           => 'required|string|max:100',
            'apellido'         => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'email'            => 'required|email|max:150|unique:alumnos',
            'telefono'         => 'nullable|string|max:20',
            'direccion'        => 'nullable|string|max:255',
        ];
    }
}
