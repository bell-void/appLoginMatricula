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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso'); // Llave primaria
            $table->string('nombre_curso', 150);
            $table->text('descripcion')->nullable();
            $table->integer('creditos');

            // Llave foránea que conecta con docentes
            $table->foreignId('id_docente')
                  ->constrained('docentes', 'id_docente')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }
};
