<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago'); // Llave primaria
            $table->decimal('monto', 10, 2); // Permite montos como 150.50
            $table->date('fecha_pago');
            $table->string('metodo_pago', 50); // Ejemplo: "Tarjeta", "Transferencia", "Efectivo"
            $table->string('estado_pago', 50)->default('Pagado'); // Ejemplo: Pagado, Pendiente, Cancelado
            
            // Llave foránea que conecta directamente con la matrícula generada
            $table->foreignId('id_matricula')
                  ->constrained('matriculas', 'id_matricula')
                  ->onDelete('cascade');
                  
            $table->timestamps();
        });
    }
};
