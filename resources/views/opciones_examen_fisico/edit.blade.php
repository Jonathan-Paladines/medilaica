@extends('layouts.app')

@section('title', 'Editar Opción de Examen Físico')

@section('content')
<div class='container'>
    <h1>Editar Opción de Examen Físico</h1>
    <form action="{{ route('opciones_examen_fisico.update', $opcion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="campo" class="form-label">Campo</label>
            <input type="text" name="campo" class="form-control" value="{{ $opcion->campo }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('opciones_examen_fisico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
