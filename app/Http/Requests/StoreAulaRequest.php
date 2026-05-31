<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAulaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre_aula' => ['required', 'string', 'max:50'],
            'capacidad'   => ['required', 'integer', 'min:1', 'max:500'],
            'ubicacion'   => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_aula.required' => 'El nombre del aula es obligatorio.',
            'capacidad.required'   => 'La capacidad es obligatoria.',
            'capacidad.integer'    => 'La capacidad debe ser un número entero.',
            'capacidad.min'        => 'La capacidad mínima es 1.',
        ];
    }
}
