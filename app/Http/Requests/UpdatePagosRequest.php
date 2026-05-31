<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePagoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'monto'        => ['sometimes', 'numeric', 'min:0.01'],
            'fecha_pago'   => ['sometimes', 'date'],
            'metodo_pago'  => ['sometimes', 'string', 'in:Tarjeta,Transferencia,Efectivo,Yape,Plin'],
            'estado_pago'  => ['sometimes', 'string', 'in:Pagado,Pendiente,Cancelado'],
            'id_matricula' => ['sometimes', 'integer', 'exists:matriculas,id_matricula'],
        ];
    }
}
