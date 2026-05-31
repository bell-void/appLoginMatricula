<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pago;

class PagoSeeder extends Seeder
{
    public function run(): void
    {
        // Asume que ya existen matrículas con id_matricula 1, 2, 3...
        // Ejecutar después de MatriculaSeeder

        $pagos = [
            [
                'monto'        => 350.00,
                'fecha_pago'   => '2026-03-01',
                'metodo_pago'  => 'Transferencia',
                'estado_pago'  => 'Pagado',
                'id_matricula' => 1,
            ],
            [
                'monto'        => 350.00,
                'fecha_pago'   => '2026-03-05',
                'metodo_pago'  => 'Yape',
                'estado_pago'  => 'Pagado',
                'id_matricula' => 2,
            ],
            [
                'monto'        => 350.00,
                'fecha_pago'   => '2026-03-10',
                'metodo_pago'  => 'Tarjeta',
                'estado_pago'  => 'Pagado',
                'id_matricula' => 3,
            ],
            [
                'monto'        => 350.00,
                'fecha_pago'   => '2026-03-15',
                'metodo_pago'  => 'Efectivo',
                'estado_pago'  => 'Pendiente',
                'id_matricula' => 4,
            ],
            [
                'monto'        => 350.00,
                'fecha_pago'   => '2026-03-20',
                'metodo_pago'  => 'Plin',
                'estado_pago'  => 'Pagado',
                'id_matricula' => 5,
            ],
        ];

        foreach ($pagos as $pago) {
            Pago::create($pago);
        }
    }
}
