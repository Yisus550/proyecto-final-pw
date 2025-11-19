<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Ordenes</title>
</head>

<body>
    <h2>Lista de Ordenes</h2>

    <a href="{{ route('orders.create') }}">Crear Nueva Orden</a>
    @if ($orders->isEmpty())
        <p>No hay ordenes disponibles.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Empleado</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Metodo de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->employee->first_name }}</td>
                        <td>{{ $order->customer->first_name }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}">Ver detalles</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Estas seguro de eliminar esta ordern?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>
