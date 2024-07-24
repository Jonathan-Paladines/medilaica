@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Contacto para {{ $persona->nombre }}</h1>
    <form action="{{ route('personas.contactos.store', $persona->id) }}" method="POST">
        @csrf
        <div class="form-group col-sm-3 mb-3">
            <label for="persona_id">Persona ID</label>
            <input type="text" name="persona_id" class="form-control" id="persona_id" value="{{ $persona->id }}" disabled>
        </div>
        
        <div class="form-group col-sm-3 mb-3">
            <label for="correo2">Correo 2</label>
            <input type="email" name="correo2" class="form-control" id="correo2" value="{{ old('correo2') }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
