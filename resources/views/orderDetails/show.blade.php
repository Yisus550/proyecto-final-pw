<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles de Orden</title>
</head>

<body>
    <h2>Detalles de Orden</h2>

    <p><strong>Orden ID:</strong> {{ $orderDetail->order_id }}</p>
    <p><strong>Producto:</strong> {{ $orderDetail->product->name }}</p>
    <p><strong>Cantidad:</strong> {{ $orderDetail->quantity }}</p>
    <p><strong>Precio por unidad:</strong> {{ $orderDetail->unit_price }}</p>
    <p><strong>Total:</strong> {{ $orderDetail->total_price }}</p>

    <a href="{{ route('order-details.edit', $orderDetail->id) }}">Editar Detalle de Orden</a>
    <a href="{{ route('order-details.index') }}">Volver a la lista de detalles de ordenes</a>
</body>

</html>
