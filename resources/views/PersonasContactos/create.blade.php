<!-- resources/views/personas_contactos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asociar Persona con Contacto</h1>
    <form action="{{ route('personas_contactos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="persona_id" class="form-label">Persona</label>
            <select name="persona_id" id="persona_id" class="form-control" required>
                <option value="" disabled selected>Seleccione una persona</option>
                @foreach($personas as $persona)
                    <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="contacto_id" class="form-label">Contacto</label>
            <div class="d-flex align-items-center">
                <select name="contacto_id" id="contacto_id" class="form-control" required>
                    <option value="" disabled selected>Seleccione un contacto</option>
                    @foreach($contactos as $contacto)
                        <option value="{{ $contacto->id }}">{{ $contacto->nombre_contacto }}</option>
                    @endforeach
                </select>
                <a href="{{ route('contactos.create') }}" class="btn btn-info btn-circle btn-sm ms-3" name="ingresar_Contacto" title="Ingresar Contacto">
                    <i class="fa fa-address-book"></i>
                </a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Asociar</button>
        <a href="{{ route('personas_contactos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <h2 class="mt-5">Relaciones entre Personas y Contactos</h2>
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
