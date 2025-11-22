@extends('layouts.app')

@section('title', 'Detalles de Categoría')

@section('content')
    <h2>Detalles de {{ $category->name }}</h2>
    <div>
        <strong>ID:</strong>
        {{ $category->id }}
    </div>
    <div>
        <strong>Nombre:</strong>
        {{ $category->name }}
    </div>
    <div>
        <strong>Descripcion:</strong>
        {{ $category->description }}
    </div>

    <div>
        <a href="{{ route('categories.edit', $category->id) }}">Editar Categoria</a>
        <a href="{{ route('categories.index') }}">Volver a la lista de categorias</a>
    </div>
@endsection
