@extends('layouts.app')

@section('title', 'Editar Orden')

@section('content')
    <div class="bg-dark-card rounded-lg shadow-lg p-8 border border-dark-border max-w-2xl mx-auto">
        <div class="mb-6">
            <h2 class="text-3xl font-bold text-dark-text">Editar Orden #{{ $order->id }}</h2>
            <p class="text-dark-text-muted mt-2">Modifique los campos necesarios para actualizar la orden</p>
        </div>

        <form action="{{ route('orders.update', $order->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="employee_id" class="block text-sm font-medium text-dark-text mb-2">
                    Empleado <span class="text-laravel-red">*</span>
                </label>
                <select name="employee_id" id="employee_id" required
                    class="w-full px-4 py-2 bg-dark-hover border border-dark-border rounded-lg text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                    @foreach ($employees as $id => $employee)
                        <option value="{{ $id }}" @selected($order->employee_id == $id) class="text-dark-text">
                            {{ $employee }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="customer_id" class="block text-sm font-medium text-dark-text mb-2">
                    Cliente <span class="text-laravel-red">*</span>
                </label>
                <select name="customer_id" id="customer_id" required
                    class="w-full px-4 py-2 bg-dark-hover border border-dark-border rounded-lg text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                    @foreach ($customers as $id => $customer)
                        <option value="{{ $id }}" @selected($order->customer_id == $id) class="text-dark-text">
                            {{ $customer }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="order_date" class="block text-sm font-medium text-dark-text mb-2">
                    Fecha de la Orden <span class="text-laravel-red">*</span>
                </label>
                <input type="date" name="order_date" id="order_date" value="{{ $order->order_date }}" required
                    class="w-full px-4 py-2 bg-dark-hover border border-dark-border rounded-lg text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
            </div>

            <div>
                <label for="total_amount" class="block text-sm font-medium text-dark-text mb-2">
                    Monto Total <span class="text-laravel-red">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-2.5 text-dark-text-muted">$</span>
                    <input type="number" step="0.01" name="total_amount" id="total_amount"
                        value="{{ $order->total_amount }}" required
                        class="w-full pl-8 pr-4 py-2 bg-dark-hover border border-dark-border rounded-lg text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                </div>
            </div>

            <div>
                <label for="payment_method" class="block text-sm font-medium text-dark-text mb-2">
                    Metodo de Pago <span class="text-laravel-red">*</span>
                </label>
                <select name="payment_method" id="payment_method" required
                    class="w-full px-4 py-2 bg-dark-hover border border-dark-border rounded-lg text-dark-text focus:outline-none focus:ring-2 focus:ring-laravel-red focus:border-transparent transition duration-200">
                    <option value="Efectivo" @selected($order->payment_method == 'Efectivo') class="text-dark-text">Efectivo</option>
                    <option value="Tarjeta de Crédito" @selected($order->payment_method == 'Tarjeta de Crédito') class="text-dark-text">
                        Tarjeta de Crédito</option>
                    <option value="Tarjeta de Débito" @selected($order->payment_method == 'Tarjeta de Débito') class="text-dark-text">
                        Tarjeta de Débito</option>
                </select>
            </div>

            <div class="flex items-center space-x-4 pt-4">
                <button type="submit"
                    class="bg-laravel-red hover:bg-laravel-red-dark text-white px-6 py-2 rounded-lg transition duration-200 font-medium">
                    Actualizar Orden
                </button>
                <a href="{{ route('orders.index') }}"
                    class="bg-dark-hover hover:bg-dark-border text-dark-text px-6 py-2 rounded-lg transition duration-200 inline-block border border-dark-border">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
