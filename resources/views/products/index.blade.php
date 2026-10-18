@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container">
    <h1 class="mb-4">Productos</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Crear un producto nuevo</a>

    <form method="GET" action="{{ route('products.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="categoria" class="form-select">
                    <option value="">Todas las categorías</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Filtrar</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td>${{ $producto->precio }}</td>
                <td>
                    <a href="{{ route('products.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('products.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $productos->links() }}
    
</div>
@endsection
