@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
<div class="container mt-5">
        <h1>Crear Contacto</h1>
        <form action="{{ route('contactos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre_contacto">Nombre Contacto</label>
                <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" required>
            </div>
            <div class="form-group">
                <label for="telefono_movil">Teléfono Móvil</label>
                <input type="text" class="form-control" id="telefono_movil" name="telefono_movil" required>
            </div>
            <div class="form-group">
                <label for="otro_telefono">Otro Teléfono</label>
                <input type="text" class="form-control" id="otro_telefono" name="otro_telefono">
            </div>
            <div class="form-group">
                <label for="parentezco">Parentezco</label>
                <input type="text" class="form-control" id="parentezco" name="parentezco" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
        </form>
    </div>
@endsection
