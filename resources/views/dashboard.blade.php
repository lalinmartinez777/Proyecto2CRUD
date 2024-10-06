<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 min-h-screen flex items-center justify-center">
    

    <div class="bg-white shadow-lg rounded-lg max-w-6xl w-full p-8">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Bienvenido al Sistema de Gestión de Libros</h1>

        <!-- Tabla de libros -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse bg-white rounded-lg overflow-hidden shadow-lg text-center">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Nombre del Libro</th>
                        <th class="py-4 px-6">Autor</th>
                        <th class="py-4 px-6">Año</th>
                        <th class="py-4 px-6">Copias Disponibles</th>
                        <th class="py-4 px-6">Páginas</th>
                        <th class="py-4 px-6">Disponible para Envío</th>
                        <th class="py-4 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($libros as $libro)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-4 px-6">{{ $libro->id }}</td>
                            <td class="py-4 px-6">{{ $libro->nombre_libro }}</td>
                            <td class="py-4 px-6">{{ $libro->nombre_autor }}</td>
                            <td class="py-4 px-6">{{ $libro->anio }}</td>
                            <td class="py-4 px-6">{{ $libro->copias_disponibles }}</td>
                            <td class="py-4 px-6">{{ $libro->paginas }}</td>
                            <td class="py-4 px-6">{{ $libro->disponible_envio ? 'Sí' : 'No' }}</td>
                            <td class="py-4 px-6">
                                <a href="{{ route('libros.edit', $libro->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500 transition w-full text-center">Editar</a>

    <!-- Botón de Eliminar -->
    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="inline-block w-full">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition w-full">Eliminar</button>
    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botón de agregar nuevo libro -->
        <div class="text-center mt-8">
            <a href="{{ route('libros.create') }}" class="bg-green-500 text-white px-8 py-3 rounded-lg hover:bg-green-600 transition duration-300">Agregar Nuevo Libro</a>
        </div>
    </div>
</body>
</html>
