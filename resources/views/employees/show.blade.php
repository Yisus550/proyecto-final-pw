@extends('layouts.app')

@section('title', 'Detalles de Empleado')

@section('content')
    <h2>Detalles de Empleado</h2>

    <div>
        <p><strong>ID:</strong> {{ $employee->id }}</p>
        <p><strong>Nombre:</strong> {{ $employee->first_name }}</p>
        <p><strong>Apellido:</strong> {{ $employee->last_name }}</p>
        <p><strong>Role:</strong> {{ $employee->role }}</p>
        <p><strong>Correo Electrónico:</strong> {{ $employee->email }}</p>
    </div>

    <div>
        <a href="{{ route('employees.edit', $employee->id) }}">Editar Empleado</a>
        <a href="{{ route('employees.index') }}">Volver a la Lista de Empleados</a>
    </div>
@endsection
