@extends('layouts.app')

@section('title', 'Lista de Detalles de Ordenes')

@section('content')
    <h2>Lista de Detalles de Ordenes</h2>

    <a href="{{ route('order-details.create') }}">Crear nuevo detalle de venta</a>
    @if ($orderDetails->isEmpty())
        <p>No hay detalles de ordenes.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Orden ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio por unidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->order_id }}</td>
                        <td>{{ $orderDetail->product->name }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td>{{ $orderDetail->unit_price }}</td>
                        <td>{{ $orderDetail->total_price }}</td>
                        <td>
                            <a href="{{ route('order-details.show', $orderDetail->id) }}">Ver detalles</a>
                            <form action="{{ route('order-details.destroy', $orderDetail->id) }}" method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este detalle de orden?')">
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
