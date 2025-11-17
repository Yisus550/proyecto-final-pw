<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
</head>

<body>
    <h2>Productos</h2>

    <a href="{{ route('products.create') }}">Crear un nuevo producto</a>
    @if ($products->isEmpty())
        <p>No hay productos disponibles.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Precio por unidad</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->unit_price }}</td>
                        <td>{{ $product->is_active ? 'Disponible' : 'No disponible' }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}">Ver detalles</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>
