@extends('layouts.app')

@section('title', 'Editar Inventario')

@section('content')
    <h2>Editar Inventario</h2>

    <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="product_id">Producto:</label>
            <select name="product_id" id="product_id" disabled>
                <option value="{{ $inventory->product->id }}">{{ $inventory->product->name }}</option>
            </select>
        </div>
        <div>
            <label for="stock_quantity">Cantidad en Stock:</label>
            <input type="number" name="stock_quantity" id="stock_quantity" min="0" value="{{ $inventory->stock_quantity }}" required>
        </div>
        <button type="submit">Actualizar Inventario</button>
    </form>

    <div>
        <a href="{{ route('inventories.show', $inventory->id) }}">Volver a Detalles</a>
        <a href="{{ route('inventories.index') }}">Volver al Inventario</a>
    </div>
@endsection
