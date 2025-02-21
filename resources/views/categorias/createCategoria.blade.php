<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Categoría</title>
</head>
<body>

<h1>Crear Categoría</h1>

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de la Categoría</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('propiedades.index') }}" class="btn btn-success">Volver</a>
</form>

</body>
</html>
