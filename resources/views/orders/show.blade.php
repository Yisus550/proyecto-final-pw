@extends('layouts.app')

@section('title', 'Detalles de Orden')

@section('content')
    <h2>Detalles de Orden</h2>

    <div>
        <p><strong>ID:</strong> {{ $order->id }}</p>
        <p><strong>Empleado:</strong> {{ $order->employee->first_name }} {{ $order->employee->last_name }}</p>
        <p><strong>Cliente:</strong> {{ $order->customer->first_name }} {{ $order->customer->last_name }}</p>
        <p><strong>Fecha de la Orden:</strong> {{ $order->order_date }}</p>
        <p><strong>Monto Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
        <p><strong>Método de Pago:</strong> {{ $order->payment_method }}</p>
    </div>

    <div>
        <a href="{{ route('orders.edit', $order->id) }}">Editar Orden</a>
        <a href="{{ route('orders.index') }}">Volver a la Lista de Ordenes</a>
    </div>
@endsection
