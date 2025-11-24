@extends('layouts.app')

@section('title', 'Agregar a Inventario')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-dark-text mb-2">Agregar Producto al Inventario</h2>
            <p class="text-dark-text-muted">Registra un nuevo producto en el sistema de inventario</p>
        </div>

        <!-- Form Card -->
        <div class="bg-dark-card border border-dark-border rounded-lg p-6 mb-6">
            <form action="{{ route('inventories.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Product Selection -->
                <div>
                    <label for="product_id" class="block text-sm font-medium text-dark-text mb-2">
                        Producto <span class="text-laravel-red">*</span>
                    </label>
                    <select name="product_id" 
                            id="product_id" 
                            required
                            class="w-full bg-dark-bg border border-dark-border text-dark-text rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent">
                        <option value="" disabled selected class="text-dark-text-muted">--- Seleccione un producto ---</option>
                        @foreach ($products as $productId => $productName)
                            <option value="{{ $productId }}" class="text-dark-text">{{ $productName }}</option>
                        @endforeach
                    </select>
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
                           required
                           class="w-full bg-dark-bg border border-dark-border text-dark-text rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent"
                           placeholder="Ingrese la cantidad">
                </div>

                <!-- Submit Button -->
                <div class="flex gap-4 pt-4">
                    <button type="submit" 
                            class="flex-1 bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                        Agregar al Inventario
                    </button>
                    <a href="{{ route('inventories.index') }}" 
                       class="flex-1 bg-dark-hover hover:bg-dark-border border border-dark-border text-dark-text font-semibold py-2 px-6 rounded-lg transition-colors duration-200 text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>

        <!-- Back Link -->
        <div class="text-center">
            <a href="{{ route('inventories.index') }}" 
               class="text-laravel-red hover:text-laravel-red-dark transition-colors duration-200">
                ← Volver al Inventario
            </a>
        </div>
    </div>
@endsection
