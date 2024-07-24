@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <h1>Lista de Contactos</h1>
        <a href="{{ route('contactos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Contacto</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Contacto</th>
                    <th>Teléfono Móvil</th>
                    <th>Otro Teléfono</th>
                    <th>Parentezco</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->id }}</td>
                        <td>{{ $contacto->nombre_contacto }}</td>
                        <td>{{ $contacto->telefono_movil }}</td>
                        <td>{{ $contacto->otro_telefono }}</td>
                        <td>{{ $contacto->parentezco }}</td>
                        <td>
                            <a href="{{ route('contactos.show', $contacto->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" style="display: inline-block;">
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