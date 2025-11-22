@extends('layouts.app')

@section('title', 'Lista de Categorías')

@section('content')
    <h2>Categorías</h2>

    <a href="{{ route('categories.create') }}">Crear una nueva categoría</a>
    @if ($categories->isEmpty())
        <p>No hay categorías disponibles.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}">Ver detalles</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
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
