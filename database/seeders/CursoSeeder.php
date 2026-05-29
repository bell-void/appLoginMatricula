<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cursos')->insert([
            [
                'nombre_curso' => 'Desarrollo Web Backend',
                'descripcion' => 'Curso de Laravel y bases de datos relacionales.',
                'creditos' => 4,
                'id_docente' => 1, // Se vincula con Carlos Mendoza
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_curso' => 'Administración de Bases de Datos',
                'descripcion' => 'Diseño y optimización de consultas SQL.',
                'creditos' => 3,
                'id_docente' => 2, // Se vincula con Ana Gomez
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
