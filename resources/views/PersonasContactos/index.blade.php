<!-- resources/views/personas_contactos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relaciones entre Personas y Contactos</h1>
    <a href="{{ route('personas_contactos.create') }}" class="btn btn-primary mb-3">Agregar Relación</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Persona</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personasContactos as $persona)
                @foreach($persona->contactos as $contacto)
                    <tr>
                        <td>{{ $persona->nombres }} {{ $persona->apellidos }}</td>
                        <td>{{ $contacto->nombre_contacto }}</td>
                        <td>{{ $contacto->telefono_movil }}</td>
                        <td>
                            <form action="{{ route('personas_contactos.destroy', [$persona->id, $contacto->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Desasociar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection
