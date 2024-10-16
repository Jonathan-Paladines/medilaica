@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
<div class="container">
    <h1>Crear Nuevo Rol</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Rol</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('nombre')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
