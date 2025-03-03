<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Laravel</title>
</head>
<body>
    <main>
        <h1>Lista de Propiedades</h1>

        <h2>Filtrar Propiedades</h2>

        <form method="GET" action="{{ route('propiedades.index') }}">
            <select name="categoria_id">
                <option value="">Todas las categorías</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>

            <select name="agente_id">
                <option value="">Todos los agentes</option>
                @foreach($agentes as $agente)
                    <option value="{{ $agente->id }}" {{ request('agente_id') == $agente->id ? 'selected' : '' }}>
                        {{ $agente->nombre }}
                    </option>
                @endforeach
            </select>

            <button class="green" type="submit">Filtrar</button>
        </form>

        <a href="{{ route('propiedades.create') }}">
            <button class="green" type="button">Crear Nueva Propiedad</button>
        </a>
        <a href="{{ route('agentes.create') }}">
            <button class="green" type="button">Crear Nuevo Agente</button>
        </a>
        <a href="{{ route('categorias.create') }}">
            <button class="green" type="button">Crear Nueva Categoria</button>
        </a>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Agente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($propiedades as $propiedad)
                    <tr>
                        <td>{{ $propiedad->id }}</td>
                        <td>{{ $propiedad->titulo }}</td>
                        <td>{{ Str::limit($propiedad->descripcion, 50) }}</td>
                        <td>{{ number_format($propiedad->precio, 2) }} €</td>
                        <td>{{ $propiedad->categoria->nombre }}</td>
                        <td>{{ $propiedad->agente->nombre }}</td>
                        <td>
                            <a href="{{ route('propiedades.show', $propiedad->id) }}">
                                <button class="green" type="button">Ver Detalles</button>
                            </a>
                            <a href="{{ route('propiedades.edit', $propiedad->id) }}">
                                <button class="editar" type="button">Editar</button>
                            </a>

                            <form action="{{ route('propiedades.destroy', $propiedad->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="eliminar" type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta propiedad?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Lista de Agentes</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agentes as $agente)
                    <tr>
                        <td>{{ $agente->id }}</td>
                        <td>{{ $agente->nombre }}</td>
                        <td>{{ $agente->telefono }}</td>
                        <td>
                            <a href="{{ route('agentes.edit', $agente->id) }}">
                                <button class="editar" type="button">Editar</button>
                            </a>
                            <form action="{{ route('agentes.destroy', $agente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="eliminar" type="submit" onclick="return confirm('¿Seguro que deseas eliminar este agente?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Lista de Categorías</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria->id) }}">
                                <button class="editar" type="button">Editar</button>
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="eliminar" type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

</body>
</html>
