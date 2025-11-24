@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-dark-text mb-2">Editar Empleado</h2>
        </div>

        <div class="bg-dark-card border border-dark-border rounded-lg p-8">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="first_name" class="block text-sm font-medium text-dark-text mb-2">Nombre:</label>
                    <input type="text" 
                           id="first_name" 
                           name="first_name" 
                           value="{{ $employee->first_name }}" 
                           required
                           class="w-full px-4 py-3 bg-dark-bg border border-dark-border rounded-lg text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-dark-text mb-2">Apellido:</label>
                    <input type="text" 
                           id="last_name" 
                           name="last_name" 
                           value="{{ $employee->last_name }}" 
                           required
                           class="w-full px-4 py-3 bg-dark-bg border border-dark-border rounded-lg text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-dark-text mb-2">Role:</label>
                    <input type="text" 
                           id="role" 
                           name="role" 
                           value="{{ $employee->role }}" 
                           required
                           class="w-full px-4 py-3 bg-dark-bg border border-dark-border rounded-lg text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-dark-text mb-2">Correo Electrónico:</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ $employee->email }}" 
                           required
                           class="w-full px-4 py-3 bg-dark-bg border border-dark-border rounded-lg text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-dark-text mb-2">Contraseña:</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           placeholder="********"
                           class="w-full px-4 py-3 bg-dark-bg border border-dark-border rounded-lg text-dark-text placeholder-dark-text-muted focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                    <small class="text-dark-text-muted text-sm mt-1 block">Dejar en blanco para mantener la contraseña actual.</small>
                </div>

                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('employees.index') }}" 
                       class="text-dark-text-muted hover:text-dark-text transition duration-150">
                        ← Volver a la Lista de Empleados
                    </a>
                    <button type="submit" 
                            class="bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                        Actualizar Empleado
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
