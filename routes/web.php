<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibroController; // Importa el controlador de libros
use Illuminate\Support\Facades\Route;

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta principal (dashboard) para mostrar todos los libros
Route::get('/dashboard', [LibroController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Ruta para la gestión de libros (por ahora con mensaje de confirmación)
Route::get('/libros/gestion', [LibroController::class, 'gestion'])->name('libros.gestion');

Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros/{id}', [LibroController::class, 'show'])->name('libros.show');
Route::get('/libros/{id}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');



// Rutas protegidas para el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para las operaciones CRUD de los libros
    Route::resource('libros', LibroController::class);
});

require __DIR__.'/auth.php';
