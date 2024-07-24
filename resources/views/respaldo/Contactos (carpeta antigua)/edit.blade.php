@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Contacto</h1>
    <form action="{{ route('contactos.update', $contacto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-sm-3 mb-3">
            <label for="persona_id">Persona ID</label>
            <input type="text" name="persona_id" class="form-control" id="persona_id" value="{{ $contacto->persona_id }}">
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="telefono1">Teléfono 1</label>
            <input type="text" name="telefono1" class="form-control" id="telefono1" value="{{ $contacto->telefono1 }}">
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="telefono2">Teléfono 2</label>
            <input type="text" name="telefono2" class="form-control" id="telefono2" value="{{ $contacto->telefono2 }}">
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="correo1">Correo 1</label>
            <input type="email" name="correo1" class="form-control" id="correo1" value="{{ $contacto->correo1 }}">
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="correo2">Correo 2</label>
            <input type="email" name="correo2" class="form-control" id="correo2" value="{{ $contacto->correo2 }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <button type="#" class="btn btn-warning">Ir a Indice de Pacientes</button>
    </form>
</div>
@endsection
