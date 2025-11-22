<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inventario</title>
    </head>
    <body>
        <h1>Inventario de Productos</h1>

        <a href="{{ route('inventories.create') }}">Agregar Nuevo Producto al Inventario</a>
        @if ($inventories->isEmpty())
            <p>No hay productos en el inventario.</p>
        @else
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Cantidad en Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->product->name }}</td>
                        <td>{{ $inventory->stock_quantity }}</td>
                        <td>
                            <a href="{{ route('inventories.show', $inventory->id) }}">Ver detalles</a>
                            <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <!-- TODO: Review 'confirm' to implement on other views -->
                                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto del inventario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </body>
</html>
