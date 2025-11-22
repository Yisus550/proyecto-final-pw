<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Detalles de Ordenes</title>
</head>

<body>
    <h2>Lista de Detalles de Ordenes</h2>

    <a href="{{ route('order-details.create') }}">Crear nuevo detalle de venta</a>
    @if ($orderDetails->isEmpty())
        <p>No hay detalels de ordenes.</p>
    @else
        <table border="1">
            <tr>
                <th>Orden ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio por unidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
            @foreach ($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $orderDetail->order_id }}</td>
                    <td>{{ $orderDetail->product->name }}</td>
                    <td>{{ $orderDetail->quantity }}</td>
                    <td>{{ $orderDetail->unit_price }}</td>
                    <td>{{ $orderDetail->total_price }}</td>
                    <td>
                        <a href="{{ route('order-details.show', $orderDetail->id) }}">Ver detalles</a>
                        <form action="{{ route('order-details.destroy', $orderDetail->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este detalle de orden?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
</body>

</html>
