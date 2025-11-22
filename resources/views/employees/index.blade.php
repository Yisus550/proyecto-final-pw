@extends('layouts.app')

@section('title', 'Lista de Empleados')

@section('content')
    <h2>Lista de Empleados</h2>

    <a href="{{ route('employees.create') }}">Agregar Nuevo Empleado</a>

    @if ($employees->isEmpty())
        <p>No hay empleados registrados.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Role</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->role }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}">Ver detalles</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" 
                                style="display:inline;"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
