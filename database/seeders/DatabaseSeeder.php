<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear el usuario de prueba para el Login (Va primero, está perfecto aquí)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
        ]);

        // 2. Ejecutar los seeders del sistema de matrícula en orden jerárquico
        $this->call([
            DocenteSeeder::class,
            AlumnoSeeder::class,
            AulaSeeder::class,
            CursoSeeder::class,
            HorarioSeeder::class,
            MatriculaSeeder::class,
            PagoSeeder::class,
        ]);
    }
}
