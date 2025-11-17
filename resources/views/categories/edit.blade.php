<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Category</title>
</head>

<body>
    <h2>Editar Categoría</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <div>
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" required>{{ $category->description }}</textarea>
        </div>

        <button type="submit">Actualizar Categoría</button>
    </form>

    <a href="{{ route('categories.index') }}">Volver a la lista de categorías</a>
</body>

</html>
