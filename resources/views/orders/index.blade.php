@extends('layouts.app')

@section('title', 'Lista de Ordenes')

@section('content')
    <div class="bg-dark-card rounded-lg shadow-lg p-6 border border-dark-border">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-dark-text">Lista de Ordenes</h2>
            <a href="{{ route('orders.create') }}"
                class="bg-laravel-red hover:bg-laravel-red-dark text-white px-6 py-2 rounded-lg transition duration-200 inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Crear Nueva Orden
            </a>
        </div>

        @if ($orders->isEmpty())
            <div class="bg-dark-hover border border-dark-border rounded-lg p-8 text-center">
                <svg class="w-16 h-16 mx-auto text-dark-text-muted mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <p class="text-dark-text-muted text-lg">No hay ordenes disponibles.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-dark-border">
                    <thead class="bg-dark-hover">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Empleado</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Cliente</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Fecha</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Total</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Metodo de Pago</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-dark-text-muted uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark-card divide-y divide-dark-border">
                        @foreach ($orders as $order)
                            <tr class="hover:bg-dark-hover transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-dark-text">
                                    {{ $order->employee->first_name }} {{ $order->employee->last_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-dark-text">
                                    {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-dark-text">
                                    {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-dark-text font-semibold">
                                    ${{ number_format($order->total_amount, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if ($order->payment_method == 'Efectivo') bg-green-900/30 text-green-400
                                        @elseif($order->payment_method == 'Tarjeta de Crédito') bg-blue-900/30 text-blue-400
                                        @else bg-purple-900/30 text-purple-400 @endif">
                                        {{ $order->payment_method }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('orders.show', $order->id) }}"
                                            class="text-blue-400 hover:text-blue-300 transition duration-150"
                                            title="Ver detalles">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('¿Estás seguro de eliminar esta orden?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-400 hover:text-red-300 transition duration-150"
                                                title="Eliminar">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
