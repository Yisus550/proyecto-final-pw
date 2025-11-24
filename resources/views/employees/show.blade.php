@extends('layouts.app')

@section('title', 'Detalles de Empleado')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-dark-text mb-2">Detalles de Empleado</h2>
        </div>

        <div class="bg-dark-card border border-dark-border rounded-lg p-8">
            <div class="space-y-6">
                <div class="border-b border-dark-border pb-4">
                    <p class="text-sm text-dark-text-muted mb-1">ID</p>
                    <p class="text-lg text-dark-text font-medium">{{ $employee->id }}</p>
                </div>

                <div class="border-b border-dark-border pb-4">
                    <p class="text-sm text-dark-text-muted mb-1">Nombre</p>
                    <p class="text-lg text-dark-text font-medium">{{ $employee->first_name }}</p>
                </div>

                <div class="border-b border-dark-border pb-4">
                    <p class="text-sm text-dark-text-muted mb-1">Apellido</p>
                    <p class="text-lg text-dark-text font-medium">{{ $employee->last_name }}</p>
                </div>

                <div class="border-b border-dark-border pb-4">
                    <p class="text-sm text-dark-text-muted mb-1">Role</p>
                    <p class="text-lg text-dark-text font-medium">{{ $employee->role }}</p>
                </div>

                <div class="pb-4">
                    <p class="text-sm text-dark-text-muted mb-1">Correo Electrónico</p>
                    <p class="text-lg text-dark-text font-medium">{{ $employee->email }}</p>
                </div>
            </div>

            <div class="flex items-center justify-between pt-6 mt-6 border-t border-dark-border">
                <a href="{{ route('employees.index') }}" 
                   class="text-dark-text-muted hover:text-dark-text transition duration-150">
                    ← Volver a la Lista de Empleados
                </a>
                <a href="{{ route('employees.edit', $employee->id) }}" 
                   class="bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
                    Editar Empleado
                </a>
            </div>
        </div>
    </div>
@endsection
