@extends('layouts.app')

@section('title', 'Editar Vacuna')

@section('content')
<div class="container">
    <h1>Editar Rol</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre del Rol</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $role->nombre) }}">
            @error('nombre')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection