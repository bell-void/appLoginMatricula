<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aula;

class AulaSeeder extends Seeder
{
    public function run(): void
    {
        $aulas = [
            ['nombre_aula' => 'Aula 101',       'capacidad' => 30,  'ubicacion' => 'Piso 1 - Pabellón A'],
            ['nombre_aula' => 'Aula 102',       'capacidad' => 30,  'ubicacion' => 'Piso 1 - Pabellón A'],
            ['nombre_aula' => 'Aula 201',       'capacidad' => 40,  'ubicacion' => 'Piso 2 - Pabellón A'],
            ['nombre_aula' => 'Aula 202',       'capacidad' => 40,  'ubicacion' => 'Piso 2 - Pabellón A'],
            ['nombre_aula' => 'Lab Informática A', 'capacidad' => 25, 'ubicacion' => 'Piso 1 - Pabellón B'],
            ['nombre_aula' => 'Lab Informática B', 'capacidad' => 25, 'ubicacion' => 'Piso 1 - Pabellón B'],
            ['nombre_aula' => 'Auditorio',      'capacidad' => 200, 'ubicacion' => 'Planta Baja'],
            ['nombre_aula' => 'Sala de Reuniones', 'capacidad' => 15, 'ubicacion' => 'Piso 3 - Rectorado'],
        ];

        foreach ($aulas as $aula) {
            Aula::create($aula);
        }
    }
}
