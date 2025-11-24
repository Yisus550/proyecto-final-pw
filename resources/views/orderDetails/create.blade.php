@extends('layouts.app')

@section('title', 'Crear Nuevo Detalle de Venta')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-dark-card border border-dark-border rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold text-dark-text mb-6">Crear Nuevo Detalle de Venta</h2>

            <form action="{{ route('order-details.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="order_id" class="block text-sm font-medium text-dark-text mb-2">Orden ID:</label>
                    <select id="order_id" name="order_id" required
                        class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-lg text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent">
                        <option value="" disabled selected>--- Seleccione una orden ---</option>
                        @foreach ($orders as $order)
                            <option value="{{ $order }}">{{ $order }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="product_id" class="block text-sm font-medium text-dark-text mb-2">Producto ID:</label>
                    <select id="product_id" name="product_id" required
                        class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-lg text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent">
                        <option value="" disabled selected>--- Seleccione un producto ---</option>
                        @foreach ($products as $product_id => $product_name)
                            <option value="{{ $product_id }}">{{ $product_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="quantity" class="block text-sm font-medium text-dark-text mb-2">Cantidad:</label>
                    <input type="number" id="quantity" name="quantity" required
                        class="w-full px-4 py-2 bg-dark-bg border border-dark-border rounded-lg text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent">
                </div>

                <div class="flex gap-4">
                    <button type="submit"
                        class="bg-laravel-red hover:bg-laravel-red-dark text-white font-bold py-2 px-6 rounded transition duration-300">
                        Guardar Detalle de Venta
                    </button>
                    <a href="{{ route('order-details.index') }}"
                        class="bg-dark-bg hover:bg-dark-hover text-dark-text border border-dark-border font-bold py-2 px-6 rounded transition duration-300">
                        Volver a la lista
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
