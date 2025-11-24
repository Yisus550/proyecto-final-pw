@extends('layouts.app')

@section('title', 'Detalles de Producto')

@section('content')
    <div class="max-w-3xl">
        <div class="mb-6">
            <h2 class="text-3xl font-semibold text-dark-text">{{ $product->name }}</h2>
            <p class="text-dark-text-muted mt-1">Detalles del producto</p>
        </div>

        <div class="bg-dark-card border border-dark-border rounded-lg p-6 space-y-4">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">ID</p>
                    <p class="text-base text-dark-text">{{ $product->id }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">Categoría</p>
                    <p class="text-base text-dark-text">{{ $product->category->name }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">Precio por Unidad</p>
                    <p class="text-base text-dark-text font-semibold">${{ number_format($product->unit_price, 2) }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">Estado</p>
                    @if ($product->is_active)
                        <span class="inline-block px-3 py-1 bg-green-500/10 text-green-400 rounded-md text-sm font-medium">Disponible</span>
                    @else
                        <span class="inline-block px-3 py-1 bg-red-500/10 text-red-400 rounded-md text-sm font-medium">No disponible</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <a href="{{ route('products.edit', $product->id) }}" 
               class="px-4 py-2 bg-laravel-red hover:bg-laravel-red-dark text-white font-medium rounded-md transition-colors duration-200">
                Editar Producto
            </a>
            <a href="{{ route('products.index') }}" 
               class="px-4 py-2 text-dark-text-muted hover:text-dark-text font-medium transition-colors duration-200">
                Volver a la Lista
            </a>
        </div>
    </div>
@endsection
