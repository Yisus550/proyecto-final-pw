@extends('layouts.app')

@section('title', 'Lista de Empleados')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-dark-text mb-6">Lista de Empleados</h2>

        <a href="{{ route('employees.create') }}" 
           class="inline-block bg-laravel-red hover:bg-laravel-red-dark text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
            Agregar Nuevo Empleado
        </a>
    </div>

    @if ($employees->isEmpty())
        <div class="bg-dark-card border border-dark-border rounded-lg p-8 text-center">
            <p class="text-dark-text-muted text-lg">No hay empleados registrados.</p>
        </div>
    @else
        <div class="bg-dark-card border border-dark-border rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-dark-hover">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-dark-text border-b border-dark-border">Nombre</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-dark-text border-b border-dark-border">Apellido</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-dark-text border-b border-dark-border">Role</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-dark-text border-b border-dark-border">Correo Electrónico</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-dark-text border-b border-dark-border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="hover:bg-dark-hover transition duration-150">
                            <td class="px-6 py-4 text-dark-text border-b border-dark-border">{{ $employee->first_name }}</td>
                            <td class="px-6 py-4 text-dark-text border-b border-dark-border">{{ $employee->last_name }}</td>
                            <td class="px-6 py-4 text-dark-text border-b border-dark-border">{{ $employee->role }}</td>
                            <td class="px-6 py-4 text-dark-text border-b border-dark-border">{{ $employee->email }}</td>
                            <td class="px-6 py-4 border-b border-dark-border">
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('employees.show', $employee->id) }}" 
                                       class="text-laravel-red hover:text-laravel-red-dark transition duration-150 font-medium">
                                        Ver detalles
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" 
                                        class="inline"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-laravel-red hover:text-laravel-red-dark transition duration-150 font-medium">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
