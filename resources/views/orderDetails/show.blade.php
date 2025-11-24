@extends('layouts.app')

@section('title', 'Detalles de Orden')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-dark-card border border-dark-border rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold text-dark-text mb-6">Detalles de Orden</h2>

            <div class="space-y-4 bg-dark-bg border border-dark-border rounded-lg p-6">
                <div class="flex justify-between py-3 border-b border-dark-border">
                    <span class="font-semibold text-dark-text">ID:</span>
                    <span class="text-dark-text-muted">{{ $orderDetail->id }}</span>
                </div>
                <div class="flex justify-between py-3 border-b border-dark-border">
                    <span class="font-semibold text-dark-text">Orden ID:</span>
                    <span class="text-dark-text-muted">{{ $orderDetail->order_id }}</span>
                </div>
                <div class="flex justify-between py-3 border-b border-dark-border">
                    <span class="font-semibold text-dark-text">Producto:</span>
                    <span class="text-dark-text-muted">{{ $orderDetail->product->name }}</span>
                </div>
                <div class="flex justify-between py-3 border-b border-dark-border">
                    <span class="font-semibold text-dark-text">Cantidad:</span>
                    <span class="text-dark-text-muted">{{ $orderDetail->quantity }}</span>
                </div>
                <div class="flex justify-between py-3 border-b border-dark-border">
                    <span class="font-semibold text-dark-text">Precio por unidad:</span>
                    <span class="text-dark-text-muted">${{ number_format($orderDetail->unit_price, 2) }}</span>
                </div>
                <div class="flex justify-between py-3">
                    <span class="font-semibold text-dark-text">Total:</span>
                    <span class="text-laravel-red font-bold">${{ number_format($orderDetail->total_price, 2) }}</span>
                </div>
            </div>

            <div class="flex gap-4 mt-6">
                <a href="{{ route('order-details.edit', $orderDetail->id) }}"
                    class="bg-laravel-red hover:bg-laravel-red-dark text-white font-bold py-2 px-6 rounded transition duration-300">
                    Editar Detalle de Orden
                </a>
                <a href="{{ route('order-details.index') }}"
                    class="bg-dark-bg hover:bg-dark-hover text-dark-text border border-dark-border font-bold py-2 px-6 rounded transition duration-300">
                    Volver a la lista
                </a>
            </div>
        </div>
    </div>
@endsection
