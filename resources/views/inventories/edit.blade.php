@extends('layouts.app')

@section('title', 'Editar Inventario')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-dark-text mb-2">Editar Inventario</h2>
            <p class="text-dark-text-muted">Actualiza la información del producto en el inventario</p>
        </div>

        <!-- Form Card -->
        <div class="bg-dark-card border border-dark-border rounded-lg p-6 mb-6">
            <form action="{{ route('inventories.update', $inventory->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Product (Disabled) -->
                <div>
                    <label for="product_id" class="block text-sm font-medium text-dark-text mb-2">
                        Producto
                    </label>
                    <select name="product_id" 
                            id="product_id" 
                            disabled
                            class="w-full bg-dark-hover border border-dark-border text-dark-text-muted rounded-lg px-4 py-2 cursor-not-allowed">
                        <option value="{{ $inventory->product->id }}">{{ $inventory->product->name }}</option>
                    </select>
                    <p class="text-dark-text-muted text-xs mt-1">El producto no puede ser modificado</p>
                </div>

                <!-- Stock Quantity -->
                <div>
                    <label for="stock_quantity" class="block text-sm font-medium text-dark-text mb-2">
                        Cantidad en Stock <span class="text-laravel-red">*</span>
                    </label>
                    <input type="number" 
                           name="stock_quantity" 
                           id="stock_quantity" 
                           min="0" 
                           value="{{ $inventory->stock_quantity }}" 
                           required
                           class="w-full bg-dark-bg border border-dark-border text-dark-text rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent">
                </div>

                <!-- Submit Button -->
                <div class="flex gap-4 pt-4">
                    <button type="submit" 
                            class="flex-1 bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                        Actualizar Inventario
                    </button>
                    <a href="{{ route('inventories.show', $inventory->id) }}" 
                       class="flex-1 bg-dark-hover hover:bg-dark-border border border-dark-border text-dark-text font-semibold py-2 px-6 rounded-lg transition-colors duration-200 text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>

        <!-- Navigation Links -->
        <div class="flex justify-center gap-6 text-sm">
            <a href="{{ route('inventories.show', $inventory->id) }}" 
               class="text-laravel-red hover:text-laravel-red-dark transition-colors duration-200">
                ← Volver a Detalles
            </a>
            <span class="text-dark-border">|</span>
            <a href="{{ route('inventories.index') }}" 
               class="text-laravel-red hover:text-laravel-red-dark transition-colors duration-200">
                Ver todo el Inventario
            </a>
        </div>
    </div>
@endsection
