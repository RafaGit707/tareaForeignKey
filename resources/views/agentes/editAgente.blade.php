<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Editar Agente</title>
</head>
<body>

    <div class="container">
        <h1>Editar Agente</h1>

        <form action="{{ route('agentes.update', $agente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Agente</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $agente->nombre) }}" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $agente->telefono) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('agentes.index') }}">
                <button class="green" type="button">Volver</button>
            </a>
        </form>

    </div>
</body>
</html>
