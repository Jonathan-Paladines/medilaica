@extends('layouts.app')

@section('title', 'Crear Enfermedad Según CIE10')

@section('content')
<div class="container">
    <h1>Crear Enfermedad</h1>
    <form action="{{ route('cie10.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" name="codigo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="detalle_cie" class="form-label">Descripción</label>
            <textarea name="detalle_cie" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('cie10.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
