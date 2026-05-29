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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id('id_aula'); // Llave primaria
            $table->string('nombre_aula', 50); // Ejemplo: "Aula 101", "Lab A"
            $table->integer('capacidad');
            $table->string('ubicacion', 100)->nullable(); // Ejemplo: "Piso 2 - Pabellón B"
            $table->timestamps();
        });
    }
};
