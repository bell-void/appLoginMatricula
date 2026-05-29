<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHorarioRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'dia_semana'  => 'sometimes|string|max:20',
            'hora_inicio' => 'sometimes|date_format:H:i',
            'hora_fin'    => 'sometimes|date_format:H:i',
            'id_curso'    => 'sometimes|exists:cursos,id_curso',
            'id_aula'     => 'sometimes|exists:aulas,id_aula',
        ];
    }
}
