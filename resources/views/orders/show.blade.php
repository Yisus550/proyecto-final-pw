@extends('layouts.app')

@section('title', 'Detalles de Orden')

@section('content')
    <div class="bg-dark-card rounded-lg shadow-lg p-8 border border-dark-border max-w-3xl mx-auto">
        <div class="mb-6">
            <h2 class="text-3xl font-bold text-dark-text">Detalles de Orden #{{ $order->id }}</h2>
            <p class="text-dark-text-muted mt-2">Información completa de la orden</p>
        </div>

        <div class="bg-dark-hover rounded-lg p-6 border border-dark-border space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-dark-text-muted uppercase tracking-wider mb-1">ID de Orden</p>
                        <p class="text-lg font-semibold text-dark-text">{{ $order->id }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-dark-text-muted uppercase tracking-wider mb-1">Empleado</p>
                        <p class="text-lg text-dark-text">
                            {{ $order->employee->first_name }} {{ $order->employee->last_name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-dark-text-muted uppercase tracking-wider mb-1">Cliente</p>
                        <p class="text-lg text-dark-text">
                            {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                        </p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-dark-text-muted uppercase tracking-wider mb-1">Fecha de la Orden</p>
                        <p class="text-lg text-dark-text">
                            {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-dark-text-muted uppercase tracking-wider mb-1">Monto Total</p>
                        <p class="text-2xl font-bold text-laravel-red">
                            ${{ number_format($order->total_amount, 2) }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-dark-text-muted uppercase tracking-wider mb-1">Método de Pago</p>
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full 
                            @if ($order->payment_method == 'Efectivo') bg-green-900/30 text-green-400
                            @elseif($order->payment_method == 'Tarjeta de Crédito') bg-blue-900/30 text-blue-400
                            @else bg-purple-900/30 text-purple-400 @endif">
                            {{ $order->payment_method }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-4 mt-8">
            <a href="{{ route('orders.edit', $order->id) }}"
                class="bg-laravel-red hover:bg-laravel-red-dark text-white px-6 py-2 rounded-lg transition duration-200 inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Editar Orden
            </a>
            <a href="{{ route('orders.index') }}"
                class="bg-dark-hover hover:bg-dark-border text-dark-text px-6 py-2 rounded-lg transition duration-200 inline-flex items-center border border-dark-border">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Volver a la Lista
            </a>
        </div>
    </div>
@endsection
