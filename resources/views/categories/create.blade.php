@extends('layouts.app')

@section('title', 'Crear Nueva Categoría')

@section('content')
    <h2>Crear Nueva Categoría</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <button type="submit">Crear Categoría</button>
    </form>
@endsection
