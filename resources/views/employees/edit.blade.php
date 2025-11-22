@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <h2>Editar Empleado</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="first_name">Nombre:</label>
            <input type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
        </div>

        <div>
            <label for="last_name">Apellido:</label>
            <input type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
        </div>

        <div>
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="{{ $employee->role }}" required>
        </div>

        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="{{ $employee->email }}" required>
        </div>

        <button type="submit">Actualizar Empleado</button>
    </form>

    <a href="{{ route('employees.index') }}">Volver a la Lista de Empleados</a>
@endsection
