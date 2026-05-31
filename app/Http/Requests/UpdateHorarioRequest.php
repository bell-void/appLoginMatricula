<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHorarioRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'dia_semana'  => ['sometimes', 'string','in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo'],
            'hora_inicio' => ['sometimes', 'date_format:H:i'],
            'hora_fin'    => ['sometimes', 'date_format:H:i', 'after:hora_inicio'],
            'id_curso'    => ['sometimes', 'integer', 'exists:cursos,id_curso'],
            'id_aula'     => ['sometimes', 'integer', 'exists:aulas,id_aula'],
        ];
    }
}
