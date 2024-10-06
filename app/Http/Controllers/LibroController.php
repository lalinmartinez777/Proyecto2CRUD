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
        'nombre_libro' => 'required|string|max:255',
        'nombre_autor' => 'required|string|max:255',
        'anio' => 'required|integer|min:1000|max:' . date('Y'),
        'copias_disponibles' => 'required|integer|min:0',
        'paginas' => 'required|integer|min:1',
        'disponible_envio' => 'required|boolean',
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
    // Validar los datos ingresados
    $validated = $request->validate([
        'nombre_libro' => 'required|string|max:255',
        'nombre_autor' => 'required|string|max:255',
        'anio' => 'required|integer|min:1000|max:' . date('Y'),
        'copias_disponibles' => 'required|integer|min:0',
        'paginas' => 'required|integer|min:1',
        'disponible_envio' => 'required|boolean',
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
    public function destroy(string $id)
    {
        //
    }

    public function gestion()
{
    // Obtener todos los libros de la base de datos
    $libros = \App\Models\Libro::all();

    // Enviar los libros a la vista
    return view('libros.gestion', compact('libros'));
}

}
