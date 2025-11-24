<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'POS System')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0a0a0a] text-[#e5e5e5] min-h-screen">
    <!-- Navigation Bar -->
    <nav class="bg-[#161616] border-b border-[#2a2a2a]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-1">
                    <a href="{{ route('categories.index') }}"
                       class="px-4 py-2 text-sm font-medium text-[#a1a1a1] hover:text-[#e5e5e5] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                        Categorías
                    </a>
                    <a href="{{ route('products.index') }}"
                       class="px-4 py-2 text-sm font-medium text-[#a1a1a1] hover:text-[#e5e5e5] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                        Productos
                    </a>
                    <a href="{{ route('inventories.index') }}"
                       class="px-4 py-2 text-sm font-medium text-[#a1a1a1] hover:text-[#e5e5e5] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                        Inventario
                    </a>
                    <a href="{{ route('employees.index') }}"
                       class="px-4 py-2 text-sm font-medium text-[#a1a1a1] hover:text-[#e5e5e5] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                        Empleados
                    </a>
                    <a href="{{ route('customers.index') }}"
                       class="px-4 py-2 text-sm font-medium text-[#a1a1a1] hover:text-[#e5e5e5] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                        Clientes
                    </a>
                    <a href="{{ route('orders.index') }}"
                       class="px-4 py-2 text-sm font-medium text-[#a1a1a1] hover:text-[#e5e5e5] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                        Órdenes
                    </a>
                    <a href="{{ route('order-details.index') }}"
                       class="px-4 py-2 text-sm font-medium text-[#a1a1a1] hover:text-[#e5e5e5] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                        Detalles de Órdenes
                    </a>
                </div>
                <div>
                    <!-- <a href="{{ route('logout') }}"
                       class="px-4 py-2 text-sm font-medium text-[#ff2d20] hover:text-[#ff483a] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                        Cerrar Sesión
                    </a> -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                           class="px-4 py-2 text-sm font-medium text-[#ff2d20] hover:text-[#ff483a] hover:bg-[#1f1f1f] rounded-md transition-colors duration-200">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>
</body>

</html>
