<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table      = 'pagos';
    protected $primaryKey = 'id_pago';

    protected $fillable = [
        'monto',
        'fecha_pago',
        'metodo_pago',
        'estado_pago',
        'id_matricula',
    ];

    protected $casts = [
        'monto'      => 'decimal:2',
        'fecha_pago' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    /** Un pago pertenece a una matrícula */
    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'id_matricula', 'id_matricula');
    }
}
