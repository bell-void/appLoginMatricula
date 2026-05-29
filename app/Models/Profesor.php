<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = 'id_docente';

    protected $fillable = [
        'nombre', 'apellido', 'especialidad',
        'email', 'telefono'
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_docente');
    }
}
