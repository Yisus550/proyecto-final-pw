<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Detalle de Orden</title>
</head>

<body>
    <h2>Editar Detalle de Orden</h2>

    <form action="{{ route('order-details.update', $orderDetail->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="order_id">Orden ID:</label>
            <select id="order_id" name="order_id" required>
                @foreach ($orders as $order)
                    <option value="{{ $order }}" @selected($orderDetail->order_id == $order)>{{ $order }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="product_id">Producto:</label>
            <select id="product_id" name="product_id" required>
                @foreach ($products as $product_id => $product_name)
                    <option value="{{ $product_id }}" @selected($orderDetail->product_id == $product_id)>{{ $product_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="quantity">Cantidad:</label>
            <input type="number" id="quantity" name="quantity" value="{{ $orderDetail->quantity }}" required>
        </div>

        <button type="submit">Actualizar Detalle de Orden</button>
    </form>

    <a href="{{ route('order-details.index') }}">Volver a la lista de detalles de ordenes</a>
</body>

</html>
