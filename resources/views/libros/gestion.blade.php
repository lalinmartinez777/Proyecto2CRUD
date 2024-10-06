<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-full max-w-6xl">
            <h1 class="text-3xl font-bold mb-4">Gestión de Libros</h1>

            <!-- Botón para agregar un nuevo libro -->
            <a href="{{ route('libros.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">
                Agregar Libro
            </a>

            <!-- Tabla de libros registrados -->
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
                        <th class="border border-gray-300 py-3 px-4 text-left">Acciones</th>
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
                            <td class="border border-gray-300 py-2 px-4">
                                <a href="{{ route('libros.show', $libro->id) }}" class="text-blue-500 hover:underline">Ver Detalles</a>
                                <a href="{{ route('libros.edit', $libro->id) }}" class="text-green-500 hover:underline">Editar</a>
                                <!-- Formulario para eliminar el libro -->
    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE') <!-- Método DELETE para eliminar -->
        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que deseas eliminar este libro?')">Eliminar</button>
    </form>
</td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('dashboard') }}" class="inline-block mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Volver al Dashboard
            </a>
        </div>
    </div>
</body>
</html>

