@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pacientes</h1>
    <a href="{{ route('personas.create') }}" class="btn btn-primary">Nuevo Paciente</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo Institucional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
            <tr>
                <td>{{ $persona->cedula }}</td>
                <td>{{ $persona->nombres }}</td>
                <td>{{ $persona->apellidos }}</td>
                <td>{{ $persona->correo1 }}</td>
                <td>
                    <a href="{{ route('personas.show', $persona) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('personas.edit', $persona) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display:inline-block;">
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
