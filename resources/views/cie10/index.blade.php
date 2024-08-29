@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Consultas Catálogo Internacional de Enfermedades (CIE10)</h1>
    <a href="{{ route('cie10.create') }}" class="btn btn-primary mb-3">Crear enfermedad</a>

    <!-- Campo de búsqueda con autocomplete -->
    <div class="form-group">
        <label for="search-cie10">Buscar enfermedad:</label>
        <input type="text" id="search-cie10" class="form-control" placeholder="Escribe para buscar...">
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cie10 as $item)
            <tr>
                <td>{{ $item->codigo }}</td>
                <td>{{ $item->detalle_cie }}</td>
                <td>
                    <a href="{{ route('cie10.show', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('cie10.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cie10.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection

