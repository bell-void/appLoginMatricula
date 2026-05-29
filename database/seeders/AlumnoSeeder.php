<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alumnos')->insert([
            [
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'fecha_nacimiento' => '2003-05-15',
                'email' => 'juan.perez@gmail.com',
                'telefono' => '955443322',
                'direccion' => 'Av. Larco 123, Lima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Maria',
                'apellido' => 'Rodriguez',
                'fecha_nacimiento' => '2004-11-22',
                'email' => 'maria.rod@gmail.com',
                'telefono' => '966554433',
                'direccion' => 'Calle Los Pinos 456, San Miguel',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
