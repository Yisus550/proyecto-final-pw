@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')
    <div class="max-w-2xl">
        <h2 class="text-3xl font-semibold text-dark-text mb-6">Agregar Nuevo Producto</h2>

        <div class="bg-dark-card border border-dark-border rounded-lg p-6">
            <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-dark-text mb-2">Nombre</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required
                           class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-md text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200">
                </div>
                
                <div>
                    <label for="category_id" class="block text-sm font-medium text-dark-text mb-2">Categoría</label>
                    <select id="category_id" 
                            name="category_id" 
                            required
                            class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-md text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200">
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="unit_price" class="block text-sm font-medium text-dark-text mb-2">Precio por Unidad</label>
                    <input type="number" 
                           step="0.01" 
                           id="unit_price" 
                           name="unit_price" 
                           required
                           class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-md text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200">
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active"
                           class="w-4 h-4 text-laravel-red bg-dark-bg border-dark-border rounded focus:ring-laravel-red focus:ring-2">
                    <label for="is_active" class="ml-2 text-sm font-medium text-dark-text">Producto Activo</label>
                </div>
                
                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('products.index') }}" 
                       class="px-4 py-2 text-dark-text-muted hover:text-dark-text font-medium transition-colors duration-200">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold rounded-md transition-colors duration-200">
                        Guardar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
