@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Regiones del Cuerpo</h1>
    <a href="{{ route('regiones_cuerpo.create') }}" class="btn btn-primary mb-3">Crear Región</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regiones as $region)
            <tr>
                <td>{{ $region->id }}</td>
                <td>{{ $region->tipo }}</td>
                <td>
                    <a href="{{ route('regiones_cuerpo.show', $region->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('regiones_cuerpo.edit', $region->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('regiones_cuerpo.destroy', $region->id) }}" method="POST" style="display:inline-block;">
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
