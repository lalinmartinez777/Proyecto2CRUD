<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Libro</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-bold mb-4">{{ $libro->nombre_libro }}</h1>

            <p><strong>Autor:</strong> {{ $libro->nombre_autor }}</p>
            <p><strong>Año:</strong> {{ $libro->anio }}</p>
            <p><strong>Copias Disponibles:</strong> {{ $libro->copias_disponibles }}</p>
            <p><strong>Páginas:</strong> {{ $libro->paginas }}</p>
            <p><strong>Disponible para Envío:</strong> {{ $libro->disponible_envio ? 'Sí' : 'No' }}</p>

            <a href="{{ route('libros.gestion') }}" class="inline-block mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Volver a Gestión de Libros
            </a>
        </div>
    </div>
</body>
</html>
