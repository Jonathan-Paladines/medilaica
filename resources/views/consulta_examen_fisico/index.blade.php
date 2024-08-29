@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Examen Físico</h1>
    <a href="{{ route('consulta_examen_fisico.create') }}" class="btn btn-primary">Crear Exámen Físico</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Estado</th>
                <th>Observación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($examenesFisicos as $examenFisico)
            <tr>
                <td>{{ $examenFisico->campo }}</td>
                <td>{{ $examenFisico->estado }}</td>
                <td>{{ $examenFisico->tratamiento }}</td>
                <td>
                    <a href="{{ route('consulta_examen_fisico.edit', $consulta->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('consulta_examen_fisico.destroy', $consulta->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
