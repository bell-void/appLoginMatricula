<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno';

    protected $fillable = [
        'nombre', 'apellido', 'fecha_nacimiento',
        'email', 'telefono', 'direccion'
    ];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_alumno');
    }
}
