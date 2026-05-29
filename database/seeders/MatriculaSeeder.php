<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matriculas')->insert([
            ['fecha_matricula' => '2026-03-01', 'estado' => 'Activo', 'id_alumno' => 1, 'id_curso' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['fecha_matricula' => '2026-03-02', 'estado' => 'Activo', 'id_alumno' => 2, 'id_curso' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
