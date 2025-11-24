@extends('layouts.app')

@section('title', 'Inventario')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-dark-text">Inventario de Productos</h1>
            <a href="{{ route('inventories.create') }}" 
               class="bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                Agregar Nuevo Producto
            </a>
        </div>

        @if ($inventories->isEmpty())
            <div class="bg-dark-card border border-dark-border rounded-lg p-8 text-center">
                <p class="text-dark-text-muted text-lg">No hay productos en el inventario.</p>
            </div>
        @else
            <!-- Table -->
            <div class="bg-dark-card border border-dark-border rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-dark-border">
                    <thead class="bg-dark-hover">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Nombre del Producto
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Cantidad en Stock
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-dark-border">
                        @foreach ($inventories as $inventory)
                            <tr class="hover:bg-dark-hover transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-dark-text">
                                    {{ $inventory->product->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-dark-text">
                                    {{ $inventory->stock_quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('inventories.show', $inventory->id) }}" 
                                       class="text-laravel-red hover:text-laravel-red-dark font-medium mr-4 transition-colors duration-200">
                                        Ver detalles
                                    </a>
                                    <form action="{{ route('inventories.destroy', $inventory->id) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto del inventario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-laravel-red hover:text-laravel-red-dark font-medium transition-colors duration-200">
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
    </div>
@endsection
