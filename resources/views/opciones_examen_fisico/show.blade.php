@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Opción de Examen Físico</h1>
    <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" class="form-control" value="{{ $opcion->id }}" disabled>
    </div>
    <div class="mb-3">
        <label for="campo" class="form-label">Campo</label>
        <input type="text" name="campo" class="form-control" value="{{ $opcion->campo }}" disabled>
    </div>
    <a href="{{ route('opciones_examen_fisico.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
