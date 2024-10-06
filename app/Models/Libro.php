<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    // Define los campos que pueden ser asignados en masa
    protected $fillable = [
        'nombre_libro',
        'nombre_autor',
        'anio',
        'copias_disponibles',
        'paginas',
        'disponible_envio',
    ];
}
