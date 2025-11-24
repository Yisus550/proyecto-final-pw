@extends('layouts.app')

@section('title', 'Detalles de Inventario')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-dark-text mb-2">Detalles del Producto en Inventario</h1>
            <p class="text-dark-text-muted">Información completa del registro de inventario</p>
        </div>

        <!-- Details Card -->
        <div class="bg-dark-card border border-dark-border rounded-lg p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- ID -->
                <div class="border-b border-dark-border pb-4">
                    <p class="text-dark-text-muted text-sm mb-1">ID</p>
                    <p class="text-dark-text text-lg font-semibold">{{ $inventory->id }}</p>
                </div>

                <!-- Product Name -->
                <div class="border-b border-dark-border pb-4">
                    <p class="text-dark-text-muted text-sm mb-1">Nombre del Producto</p>
                    <p class="text-dark-text text-lg font-semibold">{{ $inventory->product->name }}</p>
                </div>

                <!-- Stock Quantity -->
                <div class="border-b border-dark-border pb-4">
                    <p class="text-dark-text-muted text-sm mb-1">Cantidad en Stock</p>
                    <p class="text-dark-text text-lg font-semibold">{{ $inventory->stock_quantity }} unidades</p>
                </div>

                <!-- Product Price -->
                <div class="border-b border-dark-border pb-4">
                    <p class="text-dark-text-muted text-sm mb-1">Precio del Producto</p>
                    <p class="text-dark-text text-lg font-semibold">${{ number_format($inventory->product->unit_price, 2) }}</p>
                </div>

                <!-- Product Description -->
                <div class="md:col-span-2 border-b border-dark-border pb-4">
                    <p class="text-dark-text-muted text-sm mb-1">Descripción del Producto</p>
                    <p class="text-dark-text">{{ $inventory->product->description ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4 mb-6">
            <a href="{{ route('inventories.edit', $inventory->id) }}" 
               class="flex-1 bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200 text-center">
                Editar Inventario
            </a>
            <a href="{{ route('inventories.index') }}" 
               class="flex-1 bg-dark-hover hover:bg-dark-border border border-dark-border text-dark-text font-semibold py-2 px-6 rounded-lg transition-colors duration-200 text-center">
                Volver al Inventario
            </a>
        </div>

        <!-- Back Link -->
        <div class="text-center">
            <a href="{{ route('inventories.index') }}" 
               class="text-laravel-red hover:text-laravel-red-dark transition-colors duration-200">
                ← Ver lista completa
            </a>
        </div>
    </div>
@endsection
