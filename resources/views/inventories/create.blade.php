@extends('layouts.app')

@section('title', 'Agregar a Inventario')

@section('content')
    <h2>Agregar Producto al Inventario</h2>

    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf
        <div>
            <label for="product_id">Producto:</label>
            <select name="product_id" id="product_id" required>
                <option value="" disabled selected>--- Seleccione un producto ---</option>
                @foreach ($products as $productId => $productName)
                    <option value="{{ $productId }}">{{ $productName }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="stock_quantity">Cantidad en Stock:</label>
            <input type="number" name="stock_quantity" id="stock_quantity" min="0" required>
        </div>
        <button type="submit">Agregar al Inventario</button>
    </form>
    <a href="{{ route('inventories.index') }}">Volver al Inventario</a>
@endsection
