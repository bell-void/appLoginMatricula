<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas';
    protected $primaryKey = 'id_aula';
    
    protected $fillable = [
        'nombre_aula',
        'capacidad',
        'ubicacion'
    ];
    
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_aula', 'id_aula');
    }
}