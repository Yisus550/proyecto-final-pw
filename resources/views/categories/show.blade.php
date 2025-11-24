@extends('layouts.app')

@section('title', 'Detalles de Categoría')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-dark-text mb-2">Detalles de Categoría</h2>
                <p class="text-dark-text-muted">Información completa de {{ $category->name }}</p>
            </div>
            <a 
                href="{{ route('categories.index') }}"
                class="px-4 py-2 bg-dark-bg border border-dark-border rounded-lg text-dark-text hover:bg-dark-hover transition-colors duration-200"
            >
                ← Volver
            </a>
        </div>

        <!-- Details Card -->
        <div class="bg-dark-card border border-dark-border rounded-lg shadow-lg overflow-hidden">
            <!-- Category Name Header -->
            <div class="bg-dark-bg border-b border-dark-border px-6 py-4">
                <h3 class="text-2xl font-semibold text-dark-text">{{ $category->name }}</h3>
            </div>

            <!-- Details Grid -->
            <div class="p-6 space-y-6">
                <!-- ID -->
                <div class="flex items-start">
                    <div class="w-32 shrink-0">
                        <span class="text-sm font-medium text-dark-text-muted uppercase tracking-wider">ID</span>
                    </div>
                    <div class="grow">
                        <span class="text-dark-text font-mono">{{ $category->id }}</span>
                    </div>
                </div>

                <div class="border-t border-dark-border"></div>

                <!-- Name -->
                <div class="flex items-start">
                    <div class="w-32 shrink-0">
                        <span class="text-sm font-medium text-dark-text-muted uppercase tracking-wider">Nombre</span>
                    </div>
                    <div class="grow">
                        <span class="text-dark-text">{{ $category->name }}</span>
                    </div>
                </div>

                <div class="border-t border-dark-border"></div>

                <!-- Description -->
                <div class="flex items-start">
                    <div class="w-32 shrink-0">
                        <span class="text-sm font-medium text-dark-text-muted uppercase tracking-wider">Descripción</span>
                    </div>
                    <div class="grow">
                        <p class="text-dark-text leading-relaxed">{{ $category->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-dark-bg border-t border-dark-border px-6 py-4 flex items-center justify-end space-x-4">
                <a 
                    href="{{ route('categories.index') }}"
                    class="px-6 py-3 bg-dark-card border border-dark-border rounded-lg text-dark-text hover:bg-dark-hover transition-colors duration-200"
                >
                    Volver a la lista
                </a>
                <a 
                    href="{{ route('categories.edit', $category->id) }}"
                    class="px-6 py-3 bg-laravel-red hover:bg-laravel-red-dark text-white font-medium rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl"
                >
                    Editar Categoría
                </a>
            </div>
        </div>
    </div>
@endsection
