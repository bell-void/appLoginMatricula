<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = 'id_docente';
    
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'especialidad'
    ];
    
    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_docente', 'id_docente');
    }
}