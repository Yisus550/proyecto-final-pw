@extends('layouts.app')

@section('title', 'Detalles de Producto')

@section('content')
    <h2>Detalles de {{ $product->name }}</h2>

    <div>
        <p><strong>ID:</strong> {{ $product->id }}</p>
        <p><strong>Nombre:</strong> {{ $product->name }}</p>
        <p><strong>Categoria:</strong> {{ $product->category->name }}</p>
        <p><strong>Precio por unidad:</strong> {{ $product->unit_price }}</p>
        <p><strong>Activo:</strong> {{ $product->is_active ? 'Disponible' : 'No disponible' }}</p>
    </div>

    <div>
        <a href="{{ route('products.edit', $product->id) }}">Editar Producto</a>
        <a href="{{ route('products.index') }}">Volver a la lista de productos</a>
    </div>
@endsection
