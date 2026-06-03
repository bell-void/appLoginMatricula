<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'nombre_curso',
        'descripcion',
        'creditos',
        'id_docente'
    ];

    // Relación con docente (ahora apunta a Docente, no a Profesor)
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    // Alias "profesor" para mantener compatibilidad con el controlador
    public function profesor()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_curso');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_curso');
    }
}