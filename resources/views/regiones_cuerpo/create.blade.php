@extends('layouts.app')

@section('title', 'Crear Región del Cuerpo')

@section('content')
<div class="container">
    <h1>Crear Región del Cuerpo</h1>
    <form action="{{ route('regiones_cuerpo.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('regiones_cuerpo.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
