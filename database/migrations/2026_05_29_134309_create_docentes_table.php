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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('id_docente'); // Llave primaria
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('especialidad', 100)->nullable();
            $table->string('email', 150)->unique();
            $table->string('telefono', 20)->nullable();
            $table->timestamps();
        });
    }
};
