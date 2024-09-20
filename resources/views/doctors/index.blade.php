@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Doctores</h1>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Agregar Doctor</a>
    <table class="table">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Género</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{ $doctor->cedula }}</td>
                <td>{{ $doctor->nombres }}</td>
                <td>{{ $doctor->apellidos }}</td>
                <td>{{ $doctor->genero }}</td>
                <td>{{ $doctor->correo }}</td>
                <td>{{ $doctor->telefono }}</td>
                <td>
                    @if($doctor->foto)
                    <img src="{{ asset('storage/'.$doctor->foto) }}" alt="Foto de {{ $doctor->nombres }}" width="50">
                    @else
                    Sin foto
                    @endif
                </td>
                <td>
                    <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline-block;">
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