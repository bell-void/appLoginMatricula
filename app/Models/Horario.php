<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table      = 'horarios';
    protected $primaryKey = 'id_horario';

    protected $fillable = [
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'id_curso',
        'id_aula',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    /** El horario pertenece a un curso */
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }

    /** El horario pertenece a un aula */
    public function aula()
    {
        return $this->belongsTo(Aula::class, 'id_aula', 'id_aula');
    }
}
