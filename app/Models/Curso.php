<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id_curso';

    protected $fillable = [
        'nombre_curso', 'descripcion',
        'creditos', 'id_docente'
    ];

    // ✅ CORRECCIÓN: Apunta al modelo correcto (Docente, no Profesor)
    public function profesor()
    {
        return $this->belongsTo(Docente::class, 'id_docente', 'id_docente');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_curso', 'id_curso');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_curso', 'id_curso');
    }
}