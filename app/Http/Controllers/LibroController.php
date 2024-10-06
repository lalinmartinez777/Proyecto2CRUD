<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Recupera todos los libros de la base de datos
    $libros = \App\Models\Libro::all();

    // Pasa los libros a la vista del dashboard
    return view('dashboard', compact('libros'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('libros.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validación de los datos ingresados
    $validated = $request->validate([
        'nombre_libro' => [
            'required', 
            'string', 
            'max:255'
        ], // El nombre del libro es requerido y debe ser texto
        'nombre_autor' => [
            'required', 
            'string', 
            'max:255'
        ], // El nombre del autor es requerido y debe ser texto
        'anio' => [
            'required', 
            'integer', 
            'min:1000', 
            'max:' . date('Y')
        ], // Año requerido, entre 1000 y el año actual
        'copias_disponibles' => [
            'required', 
            'integer', 
            'min:0'
        ], // No puede ser negativo
        'paginas' => [
            'required', 
            'integer', 
            'min:1'
        ], // Debe ser un número positivo
        'disponible_envio' => [
            'required', 
            'boolean'
        ], // Debe ser booleano (1 o 0)
    ], [
        // Mensajes de error personalizados
        'nombre_libro.required' => 'El nombre del libro es obligatorio.',
        'nombre_libro.max' => 'El nombre del libro no debe exceder los 255 caracteres.',
        'nombre_autor.required' => 'El nombre del autor es obligatorio.',
        'nombre_autor.max' => 'El nombre del autor no debe exceder los 255 caracteres.',
        'anio.required' => 'El año de publicación es obligatorio.',
        'anio.integer' => 'El año debe ser un número válido.',
        'anio.min' => 'El año debe ser mayor o igual a 1000.',
        'anio.max' => 'El año no puede ser mayor que el año actual.',
        'copias_disponibles.required' => 'Debe ingresar la cantidad de copias disponibles.',
        'copias_disponibles.integer' => 'La cantidad de copias debe ser un número entero.',
        'copias_disponibles.min' => 'La cantidad de copias no puede ser negativa.',
        'paginas.required' => 'Debe ingresar el número de páginas.',
        'paginas.integer' => 'El número de páginas debe ser un número entero.',
        'paginas.min' => 'El número de páginas debe ser al menos 1.',
        'disponible_envio.required' => 'Debe especificar si el libro está disponible para envío.',
        'disponible_envio.boolean' => 'El campo de disponible para envío debe ser sí o no.',
    ]);

    // Guardar el libro en la base de datos
    \App\Models\Libro::create($validated);

    // Redirigir al dashboard con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'El libro fue agregado exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Buscar el libro por su ID
    $libro = \App\Models\Libro::findOrFail($id);

    // Retornar la vista con los detalles del libro
    return view('libros.show', compact('libro'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Obtener el libro por su ID
    $libro = \App\Models\Libro::findOrFail($id);

    // Enviar los datos del libro a la vista de edición
    return view('libros.edit', compact('libro'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validación de los datos ingresados
    $validated = $request->validate([
        'nombre_libro' => [
            'required', 
            'string', 
            'max:255'
        ], // El nombre del libro es requerido y debe ser texto
        'nombre_autor' => [
            'required', 
            'string', 
            'max:255'
        ], // El nombre del autor es requerido y debe ser texto
        'anio' => [
            'required', 
            'integer', 
            'min:1000', 
            'max:' . date('Y')
        ], // Año requerido, entre 1000 y el año actual
        'copias_disponibles' => [
            'required', 
            'integer', 
            'min:0'
        ], // No puede ser negativo
        'paginas' => [
            'required', 
            'integer', 
            'min:1'
        ], // Debe ser un número positivo
        'disponible_envio' => [
            'required', 
            'boolean'
        ], // Debe ser booleano (1 o 0)
    ], [
        // Mensajes de error personalizados
        'nombre_libro.required' => 'El nombre del libro es obligatorio.',
        'nombre_libro.max' => 'El nombre del libro no debe exceder los 255 caracteres.',
        'nombre_autor.required' => 'El nombre del autor es obligatorio.',
        'nombre_autor.max' => 'El nombre del autor no debe exceder los 255 caracteres.',
        'anio.required' => 'El año de publicación es obligatorio.',
        'anio.integer' => 'El año debe ser un número válido.',
        'anio.min' => 'El año debe ser mayor o igual a 1000.',
        'anio.max' => 'El año no puede ser mayor que el año actual.',
        'copias_disponibles.required' => 'Debe ingresar la cantidad de copias disponibles.',
        'copias_disponibles.integer' => 'La cantidad de copias debe ser un número entero.',
        'copias_disponibles.min' => 'La cantidad de copias no puede ser negativa.',
        'paginas.required' => 'Debe ingresar el número de páginas.',
        'paginas.integer' => 'El número de páginas debe ser un número entero.',
        'paginas.min' => 'El número de páginas debe ser al menos 1.',
        'disponible_envio.required' => 'Debe especificar si el libro está disponible para envío.',
        'disponible_envio.boolean' => 'El campo de disponible para envío debe ser sí o no.',
    ]);

    // Encontrar el libro y actualizarlo
    $libro = \App\Models\Libro::findOrFail($id);
    $libro->update($validated);

    // Redirigir al dashboard con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'El libro fue actualizado exitosamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Buscar el libro por su ID y eliminarlo
    $libro = \App\Models\Libro::findOrFail($id);
    $libro->delete();

    // Redirigir a la vista de gestión con un mensaje de éxito
    return redirect()->route('libros.gestion')->with('success', 'El libro fue eliminado exitosamente.');
}


    public function gestion()
{
    // Obtener todos los libros de la base de datos
    $libros = \App\Models\Libro::all();

    // Enviar los libros a la vista
    return view('libros.gestion', compact('libros'));
}

}
