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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('id_horario'); // Llave primaria
            $table->string('dia_semana', 20); // Ejemplo: "Lunes", "Martes"
            $table->time('hora_inicio');
            $table->time('hora_fin');
            
            // Llaves foráneas a Curso y Aula
            $table->foreignId('id_curso')
                  ->constrained('cursos', 'id_curso')
                  ->onDelete('cascade');
                  
            $table->foreignId('id_aula')
                  ->constrained('aulas', 'id_aula')
                  ->onDelete('cascade');
                  
            $table->timestamps();
        });
    }
};
