@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-3xl font-semibold text-dark-text">Productos</h2>
        <a href="{{ route('products.create') }}" 
           class="px-4 py-2 bg-laravel-red hover:bg-laravel-red-dark text-white font-medium rounded-md transition-colors duration-200">
            Crear Nuevo Producto
        </a>
    </div>

    @if ($products->isEmpty())
        <div class="bg-dark-card border border-dark-border rounded-lg p-8 text-center">
            <p class="text-dark-text-muted">No hay productos disponibles.</p>
        </div>
    @else
        <div class="bg-dark-card border border-dark-border rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-dark-hover border-b border-dark-border">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Categoría</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Precio por Unidad</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Estado</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-dark-text">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-dark-border">
                    @foreach ($products as $product)
                        <tr class="hover:bg-dark-hover transition-colors duration-150">
                            <td class="px-6 py-4 text-sm text-dark-text">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm text-dark-text-muted">{{ $product->category->name }}</td>
                            <td class="px-6 py-4 text-sm text-dark-text">${{ number_format($product->unit_price, 2) }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if ($product->is_active)
                                    <span class="px-2 py-1 bg-green-500/10 text-green-400 rounded-md text-xs font-medium">Disponible</span>
                                @else
                                    <span class="px-2 py-1 bg-red-500/10 text-red-400 rounded-md text-xs font-medium">No disponible</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('products.show', $product->id) }}" 
                                   class="text-laravel-red hover:text-laravel-red-light font-medium transition-colors duration-200">
                                    Ver Detalles
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-400 hover:text-red-300 font-medium transition-colors duration-200">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if (!empty($recentlyViewed) && count($recentlyViewed) > 0)
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-dark-text mb-4">Productos Vistos Recientemente</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($recentlyViewed as $item)
                    <div class="bg-dark-card border border-dark-border rounded-lg p-4 hover:border-laravel-red transition-colors duration-200">
                        <p class="text-dark-text font-medium">{{ $item->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
