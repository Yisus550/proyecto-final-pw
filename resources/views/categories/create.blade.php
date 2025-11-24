@extends('layouts.app')

@section('title', 'Crear Nueva Categoría')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-dark-text mb-2">Crear Nueva Categoría</h2>
            <p class="text-dark-text-muted">Añade una nueva categoría al sistema</p>
        </div>

        <!-- Form Card -->
        <div class="bg-dark-card border border-dark-border rounded-lg shadow-lg p-6">
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-dark-text mb-2">
                        Nombre <span class="text-laravel-red">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required
                        class="w-full px-4 py-3 bg-dark-bg border border-dark-border rounded-lg text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200"
                        placeholder="Ingrese el nombre de la categoría"
                    >
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-dark-text mb-2">
                        Descripción <span class="text-laravel-red">*</span>
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        required
                        rows="4"
                        class="w-full px-4 py-3 bg-dark-bg border border-dark-border rounded-lg text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200 resize-vertical"
                        placeholder="Ingrese la descripción de la categoría"
                    ></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-4">
                    <a 
                        href="{{ route('categories.index') }}"
                        class="px-6 py-3 bg-dark-bg border border-dark-border rounded-lg text-dark-text hover:bg-dark-hover transition-colors duration-200"
                    >
                        Cancelar
                    </a>
                    <button 
                        type="submit"
                        class="px-6 py-3 bg-laravel-red hover:bg-laravel-red-dark text-white font-medium rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl"
                    >
                        Crear Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
