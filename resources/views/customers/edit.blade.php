@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <div class="max-w-2xl">
        <h2 class="text-3xl font-semibold text-dark-text mb-6">Editar Cliente</h2>

        <div class="bg-dark-card border border-dark-border rounded-lg p-6">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="first_name" class="block text-sm font-medium text-dark-text mb-2">Nombre</label>
                    <input type="text" 
                           id="first_name" 
                           name="first_name" 
                           value="{{ $customer->first_name }}" 
                           required
                           class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-md text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200">
                </div>
                
                <div>
                    <label for="last_name" class="block text-sm font-medium text-dark-text mb-2">Apellido</label>
                    <input type="text" 
                           id="last_name" 
                           name="last_name" 
                           value="{{ $customer->last_name }}" 
                           required
                           class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-md text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-dark-text mb-2">Email</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ $customer->email}}" 
                           required
                           class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-md text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200">
                </div>
                
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-dark-text mb-2">Teléfono</label>
                    <input type="text" 
                           id="phone_number" 
                           name="phone_number" 
                           value="{{ $customer->phone_number}}" 
                           required
                           class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-md text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition-all duration-200">
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active" 
                           @checked($customer->is_active)
                           class="w-4 h-4 text-laravel-red bg-dark-bg border-dark-border rounded focus:ring-laravel-red focus:ring-2">
                    <label for="is_active" class="ml-2 text-sm font-medium text-dark-text">Cliente Activo</label>
                </div>
                
                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('customers.index') }}" 
                       class="px-4 py-2 text-dark-text-muted hover:text-dark-text font-medium transition-colors duration-200">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold rounded-md transition-colors duration-200">
                        Actualizar Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
