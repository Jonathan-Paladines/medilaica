@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Contactos</h1>
    <a href="{{ route('contactos.create') }}" class="btn btn-primary">Crear Nuevo Contacto</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Teléfono 1</th>
                <th>Teléfono 2</th>
                <th>Correo 1</th>
                <th>Correo 2</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactos as $contacto)
            <tr>
                <td>{{ $contacto->id }}</td>
                <td>{{ $contacto->telefono1 }}</td>
                <td>{{ $contacto->telefono2 }}</td>
                <td>{{ $contacto->correo1 }}</td>
                <td>{{ $contacto->correo2 }}</td>
                <td>
                    <a href="{{ route('contactos.show', $contacto->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" style="display:inline;">
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
