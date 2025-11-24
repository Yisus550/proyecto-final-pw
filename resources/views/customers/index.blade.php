@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-3xl font-semibold text-dark-text">Clientes</h2>
        <a href="{{ route('customers.create') }}" 
           class="px-4 py-2 bg-laravel-red hover:bg-laravel-red-dark text-white font-medium rounded-md transition-colors duration-200">
            Crear Nuevo Cliente
        </a>
    </div>

    @if ($customers->isEmpty())
        <div class="bg-dark-card border border-dark-border rounded-lg p-8 text-center">
            <p class="text-dark-text-muted">No hay clientes disponibles.</p>
        </div>
    @else
        <div class="bg-dark-card border border-dark-border rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-dark-hover border-b border-dark-border">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Apellido</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Teléfono</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-dark-text">Estado</th>
                        <th class="px-6 py-3 text-right text-sm font-medium text-dark-text">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-dark-border">
                    @foreach ($customers as $customer)
                        <tr class="hover:bg-dark-hover transition-colors duration-150">
                            <td class="px-6 py-4 text-sm text-dark-text">{{ $customer->first_name }}</td>
                            <td class="px-6 py-4 text-sm text-dark-text">{{ $customer->last_name }}</td>
                            <td class="px-6 py-4 text-sm text-dark-text-muted">{{ $customer->email }}</td>
                            <td class="px-6 py-4 text-sm text-dark-text-muted">{{ $customer->phone_number }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if ($customer->is_active)
                                    <span class="px-2 py-1 bg-green-500/10 text-green-400 rounded-md text-xs font-medium">Activo</span>
                                @else
                                    <span class="px-2 py-1 bg-red-500/10 text-red-400 rounded-md text-xs font-medium">Inactivo</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('customers.show', $customer->id) }}" 
                                   class="text-laravel-red hover:text-laravel-red-light font-medium transition-colors duration-200">
                                    Ver Detalles
                                </a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este cliente?')">
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
@endsection
