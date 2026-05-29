<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('aulas')->insert([
            ['nombre_aula' => 'Laboratorio A', 'capacidad' => 30, 'ubicacion' => 'Piso 2 - Pabellón Sistemas', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_aula' => 'Aula 102', 'capacidad' => 40, 'ubicacion' => 'Piso 1 - Pabellón Central', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
