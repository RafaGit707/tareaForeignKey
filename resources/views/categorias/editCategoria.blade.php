<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoria</title>
</head>
<body>
    <div class="container">
        <h1>Editar Categoria</h1>

        <!-- Formulario para editar el contacto -->
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('nombre', $categoria->nombre) }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
        </form>

        <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>


</body>
</html>
