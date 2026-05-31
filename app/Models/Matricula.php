<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';
    protected $primaryKey = 'id_matricula';

    protected $fillable = [
        'id_alumno',
        'id_curso',        // ← CAMBIADO: usar id_curso en lugar de id_horario
        'fecha_matricula',
        'estado',
    ];

    // Relación con Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
    }

    // Relación con Curso (DIRECTA, como espera tu controlador)
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }

    // Si aún quieres mantener la relación con horario (opcional, pero no la usas)
    // public function horario() { ... }
}