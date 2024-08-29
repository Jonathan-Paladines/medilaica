@extends('layouts.app')

@section('title', 'Crear Opción de Examen Físico')

@section('content')
<div class="container">
    <h1>Crear Opción de Examen Físico</h1>
    <form action="{{ route('opciones_examen_fisico.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="campo" class="form-label">Campo</label>
            <input type="text" name="campo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('opciones_examen_fisico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
