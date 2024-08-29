@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Opciones de Examen Físico</h1>
    <a href="{{ route('opciones_examen_fisico.create') }}" class="btn btn-primary mb-3">Crear Opción</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Campo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($opciones as $opcion)
            <tr>
                <td>{{ $opcion->id }}</td>
                <td>{{ $opcion->campo }}</td>
                <td>
                    <a href="{{ route('opciones_examen_fisico.show', $opcion->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('opciones_examen_fisico.edit', $opcion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('opciones_examen_fisico.destroy', $opcion->id) }}" method="POST" style="display:inline-block;">
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
