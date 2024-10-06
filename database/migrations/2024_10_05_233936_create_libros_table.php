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
        Schema::create('libros', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental
            $table->string('nombre_libro'); // Nombre del libro
            $table->string('nombre_autor'); // Nombre del autor
            $table->year('anio'); // Año de publicación
            $table->integer('copias_disponibles'); // Número de copias disponibles
            $table->integer('paginas'); // Número de páginas del libro
            $table->boolean('disponible_envio'); // Disponible para envío (0 o 1)
            $table->timestamps(); // Columnas created_at y updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
