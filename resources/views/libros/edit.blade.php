<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-bold mb-4">Editar Libro</h1>

            <!-- Mostrar errores de validación -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-500 p-4 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario para editar el libro -->
            <form action="{{ route('libros.update', $libro->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Método PUT para actualización -->

                <div class="mb-4">
                    <label for="nombre_libro" class="block text-gray-700">Nombre del Libro:</label>
                    <input type="text" name="nombre_libro" class="w-full px-4 py-2 border rounded" value="{{ old('nombre_libro', $libro->nombre_libro) }}" required>
                </div>

                <div class="mb-4">
                    <label for="nombre_autor" class="block text-gray-700">Nombre del Autor:</label>
                    <input type="text" name="nombre_autor" class="w-full px-4 py-2 border rounded" value="{{ old('nombre_autor', $libro->nombre_autor) }}" required>
                </div>

                <div class="mb-4">
                    <label for="anio" class="block text-gray-700">Año:</label>
                    <input type="number" name="anio" class="w-full px-4 py-2 border rounded" value="{{ old('anio', $libro->anio) }}" required>
                </div>

                <div class="mb-4">
                    <label for="copias_disponibles" class="block text-gray-700">Copias Disponibles:</label>
                    <input type="number" name="copias_disponibles" class="w-full px-4 py-2 border rounded" value="{{ old('copias_disponibles', $libro->copias_disponibles) }}" required>
                </div>

                <div class="mb-4">
                    <label for="paginas" class="block text-gray-700">Páginas:</label>
                    <input type="number" name="paginas" class="w-full px-4 py-2 border rounded" value="{{ old('paginas', $libro->paginas) }}" required>
                </div>

                <div class="mb-4">
                    <label for="disponible_envio" class="block text-gray-700">Disponible para Envío:</label>
                    <select name="disponible_envio" class="w-full px-4 py-2 border rounded">
                        <option value="1" {{ old('disponible_envio', $libro->disponible_envio) == 1 ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old('disponible_envio', $libro->disponible_envio) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Guardar Cambios</button>
            </form>

            <a href="{{ route('libros.gestion') }}" class="inline-block mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Volver a Gestión de Libros
            </a>
        </div>
    </div>
</body>
</html>
