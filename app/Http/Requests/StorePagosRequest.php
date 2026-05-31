<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePagoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'monto'        => ['required', 'numeric', 'min:0.01'],
            'fecha_pago'   => ['required', 'date'],
            'metodo_pago'  => ['required', 'string', 'in:Tarjeta,Transferencia,Efectivo,Yape,Plin'],
            'estado_pago'  => ['sometimes', 'string', 'in:Pagado,Pendiente,Cancelado'],
            'id_matricula' => ['required', 'integer', 'exists:matriculas,id_matricula'],
        ];
    }

    public function messages(): array
    {
        return [
            'monto.required'           => 'El monto es obligatorio.',
            'monto.min'                => 'El monto debe ser mayor a 0.',
            'fecha_pago.required'      => 'La fecha de pago es obligatoria.',
            'metodo_pago.required'     => 'El método de pago es obligatorio.',
            'metodo_pago.in'           => 'Método de pago inválido. Use: Tarjeta, Transferencia, Efectivo, Yape o Plin.',
            'estado_pago.in'           => 'Estado inválido. Use: Pagado, Pendiente o Cancelado.',
            'id_matricula.required'    => 'El id_matricula es obligatorio.',
            'id_matricula.exists'      => 'La matrícula indicada no existe.',
        ];
    }
}
