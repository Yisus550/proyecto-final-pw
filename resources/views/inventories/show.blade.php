<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Detalles de Inventorio</title>
    </head>
    <body>
        <h1>Detalles del Producto en Inventario</h1>

        <p><strong>Nombre del Producto:</strong> {{ $inventory->product->name }}</p>
        <p><strong>Cantidad en Stock:</strong> {{ $inventory->stock_quantity }}</p>
        <p><strong>Descripción del Producto:</strong> {{ $inventory->product->description }}</p>
        <p><strong>Precio del Producto:</strong> ${{ number_format($inventory->product->price, 2) }}</p>

        <a href="{{ route('inventories.edit', $inventory->id) }}">Editar Inventario</a>
        <a href="{{ route('inventories.index') }}">Volver al Inventario</a>
    </body>
</html>
