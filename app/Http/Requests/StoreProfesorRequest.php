<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreProfesorRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre'       => 'required|string|max:100',
            'apellido'     => 'required|string|max:100',
            'especialidad' => 'nullable|string|max:100',
            'email'        => 'required|email|max:150|unique:docentes',
            'telefono'     => 'nullable|string|max:20',
        ];
    }
}
