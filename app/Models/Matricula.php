<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';
    protected $primaryKey = 'id_matricula';

    protected $fillable = [
        'id_alumno',
        'id_horario',
        'fecha_matricula',
        'estado',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    /** La matrícula pertenece a un alumno */
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
    }

    /** La matrícula pertenece a un horario */
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario', 'id_horario');
    }
}
