@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')
    <h2>Agregar un nuevo producto</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="category_id">Categoría:</label>
            <select id="category_id" name="category_id" required>
                @foreach ($categories as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="unit_price">Precio por unidad:</label>
            <input type="number" step="0.01" id="unit_price" name="unit_price" required>
        </div>
        <div>
            <label for="is_active">Activo:</label>
            <input type="checkbox" id="is_active" name="is_active">
        </div>
        <button type="submit">Guardar producto</button>
    </form>

    <a href="{{ route('products.index') }}">Volver a la lista de productos</a>
@endsection
