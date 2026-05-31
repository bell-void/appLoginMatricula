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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id('id_matricula'); // Llave primaria
            $table->date('fecha_matricula');
            $table->string('estado', 50)->default('Activo'); // Ejemplo: Activo, Retirado, Pendiente

            // Llaves foráneas a Alumno y Curso
            $table->foreignId('id_alumno')
                  ->constrained('alumnos', 'id_alumno')
                  ->onDelete('cascade');

            $table->foreignId('id_curso')
                  ->constrained('cursos', 'id_curso')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }
};

