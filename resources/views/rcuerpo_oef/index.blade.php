@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relaciones entre Regiones del Cuerpo y Opciones de Examen Físico</h1>
    <a href="{{ route('rcuerpo_oef.create') }}" class="btn btn-primary mb-3">Crear Relación</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Región del Cuerpo</th>
                <th>Opción de Examen Físico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rcuerpoOefs as $item)
            <tr>
                <td>{{ $item->region->tipo }}</td>
                <td>{{ $item->opcionExamenFisico->campo }}</td>
                <td>
                    <a href="{{ route('rcuerpo_oef.show', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('rcuerpo_oef.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('rcuerpo_oef.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
