<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'POS System')</title>

</head>

<body>
    <nav
        style="width: 100%; display: flex; justify-content: start; align-items: center; padding: 6px; gap: 2px; border-bottom: 1px solid #ccc;">
        <ul>
            <a href="{{ route('categories.index') }}">Categorias</a>
        </ul>

        <ul>
            <a href="{{ route('products.index') }}">Productos</a>
        </ul>

        <ul>
            <a href="{{ route('inventories.index') }}">Inventario</a>
        </ul>

        <ul>
            <a href="{{ route('employees.index') }}">Empleados</a>
        </ul>

        <ul>
            <a href="{{ route('customers.index') }}">Clientes</a>
        </ul>

        <ul>
            <a href="{{ route('orders.index') }}">Ordenes</a>
        </ul>

        <ul>
            <a href="{{ route('order-details.index') }}">Detalles de Ordenes</a>
        </ul>

        <ul>
            <a href="{{ route('logout') }}">Cerrar Sesión</a>
        </ul>
    </nav>

    <main style="padding: 12px 24px;">
        @yield('content')
    </main>
</body>

</html>
