<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHorarioRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'dia_semana'  => ['required', 'string','in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo'],
            'hora_inicio' => ['required', 'date_format:H:i'],
            'hora_fin'    => ['required', 'date_format:H:i', 'after:hora_inicio'],
            'id_curso'    => ['required', 'integer', 'exists:cursos,id_curso'],
            'id_aula'     => ['required', 'integer', 'exists:aulas,id_aula'],
        ];
    }

    public function messages(): array
    {
        return [
            'dia_semana.required'  => 'El día de la semana es obligatorio.',
            'dia_semana.in'        => 'Día inválido. Use: Lunes, Martes, Miércoles, Jueves, Viernes, Sábado o Domingo.',
            'hora_inicio.required' => 'La hora de inicio es obligatoria.',
            'hora_inicio.date_format' => 'La hora de inicio debe estar en formato HH:MM (ej: 08:00).',
            'hora_fin.required'    => 'La hora de fin es obligatoria.',
            'hora_fin.after'       => 'La hora de fin debe ser posterior a la hora de inicio.',
            'id_curso.required'    => 'El id_curso es obligatorio.',
            'id_curso.exists'      => 'El curso indicado no existe.',
            'id_aula.required'     => 'El id_aula es obligatorio.',
            'id_aula.exists'       => 'El aula indicada no existe.',
        ];
    }
}
