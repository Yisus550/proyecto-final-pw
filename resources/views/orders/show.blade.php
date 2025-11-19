<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles de Orden</title>
</head>

<body>
    <h2>Detalles de Orden</h2>

    <p><strong>Empleado:</strong> {{ $order->employee->first_name }}</p>
    <p><strong>Cliente:</strong> {{ $order->customer->first_name }}</p>
    <p><strong>Fecha de la Orden:</strong> {{ $order->order_date }}</p>
    <p><strong>Monto Total:</strong> {{ $order->total_amount }}</p>

    <a href="{{ route('orders.edit', $order->id) }}">Editar Orden</a>
    <a href="{{ route('orders.index') }}">Volver a la Lista de Ordenes</a>
</body>

</html>
