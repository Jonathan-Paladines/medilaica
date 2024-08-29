@extends('layouts.app')

@section('title', 'Editar Enfermedad')

@section('content')
<div class='container'>
    <h1>Editar Enfermedad en base a CIE10</h1>
    <form action="{{ route('cie10.update', $cie10->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" name="codigo" class="form-control" value="{{ $cie10->codigo }}" required>
        </div>
        <div class="mb-3">
            <label for="detalle_cie" class="form-label">Descripción</label>
            <textarea name="detalle_cie" class="form-control" required>{{ $cie10->detalle_cie }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('cie10.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
