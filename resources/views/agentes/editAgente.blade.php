<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Agente</title>
</head>
<body>

<h1>Editar Agente</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

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

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('agentes.index') }}" class="btn btn-success">Volver</a>
</form>

</body>
</html>
