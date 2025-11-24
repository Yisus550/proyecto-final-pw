@extends('layouts.app')

@section('title', 'Lista de Detalles de Ordenes')

@section('content')
    <div class="bg-dark-card border border-dark-border rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-dark-text">Lista de Detalles de Ordenes</h2>
            <a href="{{ route('order-details.create') }}"
                class="bg-laravel-red hover:bg-laravel-red-dark text-white font-bold py-2 px-4 rounded transition duration-300">
                Crear nuevo detalle de venta
            </a>
        </div>

        @if ($orderDetails->isEmpty())
            <div class="bg-dark-bg border border-dark-border rounded-lg p-8 text-center">
                <p class="text-dark-text-muted text-lg">No hay detalles de ordenes.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-dark-bg border border-dark-border rounded-lg">
                    <thead class="bg-dark-hover">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text uppercase tracking-wider border-b border-dark-border">Orden ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text uppercase tracking-wider border-b border-dark-border">Producto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text uppercase tracking-wider border-b border-dark-border">Cantidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text uppercase tracking-wider border-b border-dark-border">Precio por unidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text uppercase tracking-wider border-b border-dark-border">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-dark-text uppercase tracking-wider border-b border-dark-border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-dark-border">
                        @foreach ($orderDetails as $orderDetail)
                            <tr class="hover:bg-dark-hover transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-dark-text">{{ $orderDetail->order_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-dark-text">{{ $orderDetail->product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-dark-text">{{ $orderDetail->quantity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-dark-text">${{ number_format($orderDetail->unit_price, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-dark-text">${{ number_format($orderDetail->total_price, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                    <a href="{{ route('order-details.show', $orderDetail->id) }}"
                                        class="text-laravel-red hover:text-white transition duration-300">
                                        Ver detalles
                                    </a>
                                    <form action="{{ route('order-details.destroy', $orderDetail->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este detalle de orden?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-laravel-red hover:text-white transition duration-300">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
