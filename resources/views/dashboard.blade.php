<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Enlace al CSS de Tailwind -->
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Contenedor principal con Tailwind -->
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-6xl bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-4xl font-bold mb-6">Bienvenido al sistema de gestión de libros de la librería</h1>
            <div class="mb-4">
                <a href="{{ route('libros.gestion') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Gestión de Libros
                </a>
            </div>

            <table class="min-w-full bg-white border-collapse border border-gray-300 shadow-md">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 py-3 px-4 text-left">ID</th>
                        <th class="border border-gray-300 py-3 px-4 text-left">Nombre del Libro</th>
                        <th class="border border-gray-300 py-3 px-4 text-left">Nombre del Autor</th>
                        <th class="border border-gray-300 py-3 px-4 text-left">Año</th>
                        <th class="border border-gray-300 py-3 px-4 text-left">Copias Disponibles</th>
                        <th class="border border-gray-300 py-3 px-4 text-left">Páginas</th>
                        <th class="border border-gray-300 py-3 px-4 text-left">Disponible para Envío</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                        <tr class="border-t">
                            <td class="border border-gray-300 py-2 px-4">{{ $libro->id }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $libro->nombre_libro }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $libro->nombre_autor }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $libro->anio }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $libro->copias_disponibles }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $libro->paginas }}</td>
                            <td class="border border-gray-300 py-2 px-4">{{ $libro->disponible_envio ? 'Sí' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
