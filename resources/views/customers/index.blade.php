@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <h2>Lista de Clientes</h2>

    <a href="{{ route('customers.create') }}">Crear Nuevo Cliente</a>
    @if ($customers->isEmpty())
        <p>No hay clientes disponibles.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->is_active ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer->id) }}">Ver detalles</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" 
                                style="display:inline;"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">
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
