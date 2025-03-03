<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Editar Categoria</title>
</head>
<body>
    <div class="container">
        <h1>Editar Categoria</h1>

        <!-- Formulario para editar el contacto -->
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $categoria->nombre) }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
            <a href="{{ route('categorias.index') }}">
                <button class="green" type="button">Volver</button>
            </a>
        </form>

    </div>

</body>
</html>
