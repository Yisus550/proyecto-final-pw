@extends('layouts.app')

@section('title', 'Detalles de Cliente')

@section('content')
    <div class="max-w-3xl">
        <div class="mb-6">
            <h2 class="text-3xl font-semibold text-dark-text">{{ $customer->first_name }} {{ $customer->last_name }}</h2>
            <p class="text-dark-text-muted mt-1">Detalles del cliente</p>
        </div>

        <div class="bg-dark-card border border-dark-border rounded-lg p-6 space-y-4">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">ID</p>
                    <p class="text-base text-dark-text">{{ $customer->id }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">Nombre</p>
                    <p class="text-base text-dark-text">{{ $customer->first_name }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">Apellido</p>
                    <p class="text-base text-dark-text">{{ $customer->last_name }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">Email</p>
                    <p class="text-base text-dark-text">{{ $customer->email }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">Teléfono</p>
                    <p class="text-base text-dark-text">{{ $customer->phone_number }}</p>
                </div>
                
                <div>
                    <p class="text-sm font-medium text-dark-text-muted mb-1">Estado</p>
                    @if ($customer->is_active)
                        <span class="inline-block px-3 py-1 bg-green-500/10 text-green-400 rounded-md text-sm font-medium">Activo</span>
                    @else
                        <span class="inline-block px-3 py-1 bg-red-500/10 text-red-400 rounded-md text-sm font-medium">Inactivo</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center space-x-4">
            <a href="{{ route('customers.edit', $customer->id) }}" 
               class="px-4 py-2 bg-laravel-red hover:bg-laravel-red-dark text-white font-medium rounded-md transition-colors duration-200">
                Editar Cliente
            </a>
            <a href="{{ route('customers.index') }}" 
               class="px-4 py-2 text-dark-text-muted hover:text-dark-text font-medium transition-colors duration-200">
                Volver a la Lista
            </a>
        </div>
    </div>
@endsection
