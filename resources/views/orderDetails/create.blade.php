@extends('layouts.app')

@section('title', 'Crear Nuevo Detalle de Venta')

@section('content')
    <h2>Crear Nuevo Detalle de Venta</h2>

    <form action="{{ route('order-details.store') }}" method="POST">
        @csrf
        <div>
            <label for="order_id">Orden ID:</label>
            <select id="order_id" name="order_id" required>
                <option value="" disabled selected>--- Seleccione una orden ---</option>
                @foreach ($orders as $order)
                    <option value="{{ $order }}">{{ $order }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="product_id">Producto ID:</label>
            <select id="product_id" name="product_id" required>
                <option value="" disabled selected>--- Seleccione un producto ---</option>
                @foreach ($products as $product_id => $product_name)
                    <option value="{{ $product_id }}">{{ $product_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="quantity">Cantidad:</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>

        <button type="submit">Guardar Detalle de Venta</button>
    </form>

    <a href="{{ route('order-details.index') }}">Volver a la lista de detalles de ordenes</a>
@endsection
