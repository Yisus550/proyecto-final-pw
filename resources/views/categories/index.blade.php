@extends('layouts.app')

@section('title', 'Lista de Categorías')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-3xl font-semibold text-dark-text">Categorías</h2>
        <a href="{{ route('categories.create') }}" 
           class="px-4 py-2 bg-laravel-red hover:bg-laravel-red-dark text-white font-medium rounded-md transition-colors duration-200">
            Crear Nueva Categoría
        </a>
    </div>

    @if ($categories->isEmpty())
        <div class="bg-dark-card border border-dark-border rounded-lg p-8 text-center">
            <p class="text-dark-text-muted">No hay categorías disponibles.</p>
        </div>
    @else
        <div class="bg-dark-card border border-dark-border rounded-lg overflow-hidden mb-8">
            <table class="w-full">
                <thead class="bg-dark-hover border-b border-dark-border">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Descripción</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-dark-text">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-dark-border">
                    @foreach ($categories as $category)
                        <tr class="hover:bg-dark-hover transition-colors duration-150">
                            <td class="px-6 py-4 text-sm text-dark-text font-medium">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-sm text-dark-text-muted">{{ $category->description }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('categories.show', $category->id) }}" 
                                   class="text-laravel-red hover:text-laravel-red-light font-medium transition-colors duration-200">
                                    Ver Detalles
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
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

        @if (!empty($recentlyViewed) && count($recentlyViewed) > 0)
            <div>
                <h3 class="text-xl font-semibold text-dark-text mb-4">Categorías Vistas Recientemente</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($recentlyViewed as $item)
                        <div class="bg-dark-card border border-dark-border rounded-lg p-4 hover:border-laravel-red transition-colors duration-200">
                            <p class="text-dark-text font-medium">{{ $item->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@endsection
