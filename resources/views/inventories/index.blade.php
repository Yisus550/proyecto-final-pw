@extends('layouts.app')

@section('title', 'Inventario')

@section('content')
    <h1>Inventario de Productos</h1>

    <a href="{{ route('inventories.create') }}">Agregar Nuevo Producto al Inventario</a>
    @if ($inventories->isEmpty())
        <p>No hay productos en el inventario.</p>
    @else
    <table border="1">
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad en Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->product->name }}</td>
                    <td>{{ $inventory->stock_quantity }}</td>
                    <td>
                        <a href="{{ route('inventories.show', $inventory->id) }}">Ver detalles</a>
                        <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" 
                            style="display:inline;"
                            onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto del inventario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
