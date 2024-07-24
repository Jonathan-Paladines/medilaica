@extends('layouts.app')

@section('title', 'Editar Vacuna')

@section('content')
<div class="container mt-5">
        <h1>Editar Contacto</h1>
        <form action="{{ route('contactos.update', $contacto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_contacto">Nombre Contacto</label>
                <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="{{ $contacto->nombre_contacto }}" required>
            </div>
            <div class="form-group">
                <label for="telefono_movil">Teléfono Móvil</label>
                <input type="text" class="form-control" id="telefono_movil" name="telefono_movil" value="{{ $contacto->telefono_movil }}" required>
            </div>
            <div class="form-group">
                <label for="otro_telefono">Otro Teléfono</label>
                <input type="text" class="form-control" id="otro_telefono" name="otro_telefono" value="{{ $contacto->otro_telefono }}">
            </div>
            <div class="form-group">
                <label for="parentezco">Parentezco</label>
                <input type="text" class="form-control" id="parentezco" name="parentezco" value="{{ $contacto->parentezco }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
        </form>
    </div>
@endsection