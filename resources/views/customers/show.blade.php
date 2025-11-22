@extends('layouts.app')

@section('title', 'Detalles de Cliente')

@section('content')
    <h2>Detalles de Cliente</h2>

    <div>
        <div>
            <strong>ID:</strong> {{ $customer->id }}
        </div>
        <div>
            <strong>Nombre:</strong> {{ $customer->first_name }}
        </div>
        <div>
            <strong>Apellido:</strong> {{ $customer->last_name }}
        </div>
        <div>
            <strong>Email:</strong> {{ $customer->email }}
        </div>
        <div>
            <strong>Teléfono:</strong> {{ $customer->phone_number }}
        </div>
        <div>
            <strong>Activo:</strong> {{ $customer->is_active ? 'Sí' : 'No' }}
        </div>
    </div>

    <div>
        <a href="{{ route('customers.edit', $customer->id) }}">Editar Cliente</a>
        <a href="{{ route('customers.index') }}">Volver a la Lista de Clientes</a>
    </div>
@endsection
