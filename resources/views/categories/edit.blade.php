@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <h2>Editar Categoría</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <div>
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" required>{{ $category->description }}</textarea>
        </div>

        <button type="submit">Actualizar Categoría</button>
    </form>

    <a href="{{ route('categories.index') }}">Volver a la lista de categorías</a>
@endsection
