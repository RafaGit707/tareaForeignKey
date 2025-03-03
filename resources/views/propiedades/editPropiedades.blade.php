<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <title>Editar Propiedades</title>
    </head>
<body>

    <div class="container">
        <h2>Editar Propiedad</h2>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <form class="form-edit" action="{{ route('propiedades.update', $propiedad->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $propiedad->titulo) }}" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required>{{ old('descripcion', $propiedad->descripcion) }}</textarea>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="{{ old('precio', $propiedad->precio) }}" step="0.01" required>

            <label for="categoria_id">Categoría:</label>
            <select id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $propiedad->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>

            <label for="agente_id">Agente:</label>
            <select id="agente_id" name="agente_id" required>
                @foreach($agentes as $agente)
                    <option value="{{ $agente->id }}" {{ $propiedad->agente_id == $agente->id ? 'selected' : '' }}>
                        {{ $agente->nombre }}
                    </option>
                @endforeach
            </select>

            <button class="editar" type="submit">Guardar Cambios</button>

            <a href="{{ route('propiedades.index') }}">
                <button class="green" type="button">Volver</button>
            </a>
        </form>

    </div>
</body>
</html>
