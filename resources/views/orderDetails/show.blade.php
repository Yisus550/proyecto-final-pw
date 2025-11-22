@extends('layouts.app')

@section('title', 'Detalles de Orden')

@section('content')
    <h2>Detalles de Orden</h2>

    <div>
        <p><strong>ID:</strong> {{ $orderDetail->id }}</p>
        <p><strong>Orden ID:</strong> {{ $orderDetail->order_id }}</p>
        <p><strong>Producto:</strong> {{ $orderDetail->product->name }}</p>
        <p><strong>Cantidad:</strong> {{ $orderDetail->quantity }}</p>
        <p><strong>Precio por unidad:</strong> ${{ number_format($orderDetail->unit_price, 2) }}</p>
        <p><strong>Total:</strong> ${{ number_format($orderDetail->total_price, 2) }}</p>
    </div>

    <div>
        <a href="{{ route('order-details.edit', $orderDetail->id) }}">Editar Detalle de Orden</a>
        <a href="{{ route('order-details.index') }}">Volver a la lista de detalles de ordenes</a>
    </div>
@endsection
