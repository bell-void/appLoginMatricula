<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocenteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('docentes')->insert([
            [
                'nombre' => 'Carlos',
                'apellido' => 'Mendoza',
                'especialidad' => 'Ingeniería de Software',
                'email' => 'carlos.mendoza@universidad.edu.pe',
                'telefono' => '987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'Gomez',
                'especialidad' => 'Bases de Datos',
                'email' => 'ana.gomez@universidad.edu.pe',
                'telefono' => '912345678',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
