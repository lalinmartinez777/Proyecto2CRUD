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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
    return view('libros.gestion');
}

}
