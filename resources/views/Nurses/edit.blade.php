@extends('layouts.app')

@section('title', 'Editar Vacuna')

@section('content')
<div class="container">
    <h1>Editar Enfermera</h1>
    <form action="{{ route('nurses.update', $nurse->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Campos similares al formulario de creación, pero con valores antiguos -->
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $nurse->cedula) }}">
            @error('cedula')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- Continúa con los demás campos -->
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $nurse->nombres) }}">
            @error('nombres')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- Campos para apellidos, correo, teléfono -->
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $nurse->apellidos) }}">
            @error('apellidos')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $nurse->correo) }}">
            @error('correo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $nurse->telefono) }}">
            @error('telefono')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- Campo para la foto -->
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control-file">
            @if($nurse->foto)
            <img src="{{ asset('storage/'.$nurse->foto) }}" alt="Foto de {{ $nurse->nombres }}" width="100">
            @endif
            @error('foto')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- Campo oculto para el role_id -->
        <input type="hidden" name="role_id" value="{{ $roles->first()->id }}">
        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
        <a href="{{ route('nurses.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection