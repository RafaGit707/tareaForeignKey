<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles de la Propiedad</title>
</head>
<body>

    <h1>Detalles de la Propiedad</h1>

    <p><strong>ID:</strong> {{ $propiedad->id }}</p>
    <p><strong>Título:</strong> {{ $propiedad->titulo }}</p>
    <p><strong>Descripción:</strong> {{ $propiedad->descripcion }}</p>
    <p><strong>Precio:</strong> {{ number_format($propiedad->precio, 2) }} €</p>
    <p><strong>Categoría:</strong> {{ optional($propiedad->categoria)->nombre ?? 'Sin categoría' }}</p>
    <p><strong>Agente:</strong> {{ optional($propiedad->agente)->nombre ?? 'Sin agente' }}</p>

    <a href="{{ route('propiedades.index') }}">
        <button type="button">Volver a la Lista</button>
    </a>

    <a href="{{ route('propiedades.edit', $propiedad->id) }}">
        <button type="button">Editar Propiedad</button>
    </a>

    <form action="{{ route('propiedades.destroy', $propiedad->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta propiedad?')">
            Eliminar Propiedad
        </button>
    </form>

</body>
</html>
