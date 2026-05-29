<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('horarios')->insert([
            ['dia_semana' => 'Lunes', 'hora_inicio' => '08:00:00', 'hora_fin' => '11:00:00', 'id_curso' => 1, 'id_aula' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['dia_semana' => 'Miércoles', 'hora_inicio' => '14:00:00', 'hora_fin' => '17:00:00', 'id_curso' => 2, 'id_aula' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
