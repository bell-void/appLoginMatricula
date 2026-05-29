<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreHorarioRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'dia_semana'  => 'required|string|max:20',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin'    => 'required|date_format:H:i|after:hora_inicio',
            'id_curso'    => 'required|exists:cursos,id_curso',
            'id_aula'     => 'required|exists:aulas,id_aula',
        ];
    }
}
