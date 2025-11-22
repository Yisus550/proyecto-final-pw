@extends('layouts.app')

@section('title', 'Agregar Nuevo Cliente')

@section('content')
    <h2>Agregar un Nuevo Cliente</h2>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div>
            <label for="first_name">Nombre:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>

        <div>
            <label for="last_name">Apellido:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="phone_number">Teléfono:</label>
            <input type="text" id="phone_number" name="phone_number" required>
        </div>

        <div>
            <label for="is_active">Activo:</label>
            <input type="checkbox" id="is_active" name="is_active">
        </div>

        <button type="submit">Guardar Cliente</button>
    </form>

    <a href="{{ route('customers.index') }}">Volver a la Lista de Clientes</a>
@endsection
