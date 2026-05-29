<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pagos')->insert([
            ['monto' => 350.00, 'fecha_pago' => '2026-03-01', 'metodo_pago' => 'Transferencia', 'estado_pago' => 'Pagado', 'id_matricula' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['monto' => 300.00, 'fecha_pago' => '2026-03-02', 'metodo_pago' => 'Tarjeta de Crédito', 'estado_pago' => 'Pagado', 'id_matricula' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
