<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Crear Propiedad</title>
</head>
<body>

<div class="container">

    <h1>Crear Propiedad</h1>

    <form class="form-edit" action="{{ route('propiedades.store') }}" method="POST">
        @csrf


        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control" required>

        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>

        <label for="categoria" class="form-label">Categoría</label>
        <select name="categoria_id" id="categoria" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>

        <label for="agente" class="form-label">Agente</label>
        <select name="agente_id" id="agente" required>
            @foreach($agentes as $agente)
                <option value="{{ $agente->id }}">{{ $agente->nombre }}</option>
            @endforeach
        </select>

        <label for="precio" class="form-label">Precio</label>
        <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>


        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('propiedades.index') }}">
            <button class="green" type="button">Volver</button>
        </a>
    </form>

</div>

</body>
</html>
