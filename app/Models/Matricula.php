<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table      = 'matriculas';
    protected $primaryKey = 'id_matricula';

    protected $fillable = [
        'fecha_matricula',
        'estado',
        'id_alumno',
        'id_curso',
    ];

    protected $casts = [
        'fecha_matricula' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }

    /** Una matrícula puede tener múltiples pagos */
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_matricula', 'id_matricula');
    }
}
