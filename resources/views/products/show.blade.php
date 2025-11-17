<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles de Producto</title>
</head>

<body>
    <h2>Detalles de {{ $product->name }}</h2>

    <a href="{{ route('products.index') }}">Volver a la lista de productos</a>
    <p><strong>Nombre:</strong> {{ $product->name }}</p>
    <p><strong>Categoria:</strong> {{ $product->category }}</p>
    <p><strong>Precio por unidad:</strong> {{ $product->unit_price }}</p>
    <p><strong>Activo:</strong> {{ $product->is_active ? 'Disponible' : 'No disponible' }}</p>
    <a href="{{ route('products.edit', $product->id) }}">Editar Producto</a>
</body>

</html>
