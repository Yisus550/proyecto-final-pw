@extends('layouts.app')

@section('title', 'Detalles de Inventario')

@section('content')
    <h1>Detalles del Producto en Inventario</h1>

    <div>
        <p><strong>ID:</strong> {{ $inventory->id }}</p>
        <p><strong>Nombre del Producto:</strong> {{ $inventory->product->name }}</p>
        <p><strong>Cantidad en Stock:</strong> {{ $inventory->stock_quantity }}</p>
        <p><strong>Descripción del Producto:</strong> {{ $inventory->product->description ?? 'N/A' }}</p>
        <p><strong>Precio del Producto:</strong> ${{ number_format($inventory->product->unit_price, 2) }}</p>
    </div>

    <div>
        <a href="{{ route('inventories.edit', $inventory->id) }}">Editar Inventario</a>
        <a href="{{ route('inventories.index') }}">Volver al Inventario</a>
    </div>
@endsection
