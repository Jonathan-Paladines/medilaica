@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Opciones de Exámenes Físicos</h1>
    <a href="{{ route('detalle_examen_fisico.create') }}" class="btn btn-primary mb-3">Crear Detalle de Examen Físico</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Región Corporal/Examen Físico</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $item)
            <tr>
                <td>{{ $item->rcuerpoOef->region->tipo }} - {{ $item->rcuerpoOef->opcionExamenFisico->campo }}</td>
                <td>{{ $item->estado ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <a href="{{ route('detalle_examen_fisico.show', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('detalle_examen_fisico.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('detalle_examen_fisico.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
