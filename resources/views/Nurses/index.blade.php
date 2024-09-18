@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Enfermeras</h1>
    <a href="{{ route('nurses.create') }}" class="btn btn-primary mb-3">Agregar Enfermera</a>
    <table class="table">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nurses as $nurse)
            <tr>
                <td>{{ $nurse->cedula }}</td>
                <td>{{ $nurse->nombres }}</td>
                <td>{{ $nurse->apellidos }}</td>
                <td>{{ $nurse->correo }}</td>
                <td>{{ $nurse->telefono }}</td>
                <td>
                    @if($nurse->foto)
                    <img src="{{ asset('storage/'.$nurse->foto) }}" alt="Foto de {{ $nurse->nombres }}" width="50">
                    @else
                    Sin foto
                    @endif
                </td>
                <td>
                    <a href="{{ route('nurses.show', $nurse->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('nurses.edit', $nurse->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('nurses.destroy', $nurse->id) }}" method="POST" style="display:inline-block;">
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