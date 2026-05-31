<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAulaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre_aula' => ['sometimes', 'string', 'max:50'],
            'capacidad'   => ['sometimes', 'integer', 'min:1', 'max:500'],
            'ubicacion'   => ['nullable', 'string', 'max:100'],
        ];
    }
}
