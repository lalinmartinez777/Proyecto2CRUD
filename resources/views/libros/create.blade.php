<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-3xl font-bold mb-6 text-blue-600">Agregar un Nuevo Libro</h1>

            <!-- Mostrar errores de validación -->
            @if ($errors->any())
                <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block">Por favor corrige los siguientes errores:</span>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario para agregar un nuevo libro -->
            <form action="{{ route('libros.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="nombre_libro" class="block text-gray-700 font-semibold mb-2">Nombre del Libro:</label>
                    <input type="text" name="nombre_libro" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" value="{{ old('nombre_libro') }}" required>
                </div>

                <div class="mb-5">
                    <label for="nombre_autor" class="block text-gray-700 font-semibold mb-2">Nombre del Autor:</label>
                    <input type="text" name="nombre_autor" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" value="{{ old('nombre_autor') }}" required>
                </div>

                <div class="mb-5">
                    <label for="anio" class="block text-gray-700 font-semibold mb-2">Año:</label>
                    <input type="number" name="anio" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" value="{{ old('anio') }}" required>
                </div>

                <div class="mb-5">
                    <label for="copias_disponibles" class="block text-gray-700 font-semibold mb-2">Copias Disponibles:</label>
                    <input type="number" name="copias_disponibles" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" value="{{ old('copias_disponibles') }}" required>
                </div>

                <div class="mb-5">
                    <label for="paginas" class="block text-gray-700 font-semibold mb-2">Páginas:</label>
                    <input type="number" name="paginas" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" value="{{ old('paginas') }}" required>
                </div>

                <div class="mb-5">
                    <label for="disponible_envio" class="block text-gray-700 font-semibold mb-2">Disponible para Envío:</label>
                    <select name="disponible_envio" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                        <option value="1" {{ old('disponible_envio') == 1 ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old('disponible_envio') == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Agregar</button>
            </form>

            <a href="{{ route('libros.gestion') }}" class="block text-center mt-4 text-blue-500 hover:underline">Volver a Gestión de Libros</a>
        </div>
    </div>
</body>
</html>
