<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Enlace a Tailwind CSS -->
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg">
            <h1 class="text-3xl font-bold mb-4">Gestión de Libros</h1>

            <!-- Botón para agregar un nuevo libro -->
            <a href="{{ route('libros.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Agregar Libro
            </a>

            <a href="{{ route('dashboard') }}" class="inline-block mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Volver al Dashboard
            </a>
        </div>
    </div>
</body>
</html>

