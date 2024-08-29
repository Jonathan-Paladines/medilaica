@extends('layouts.app')

@section('title', 'Editar Región del Cuerpo')

@section('content')
<div class='container'>
    <h1>Editar Región del Cuerpo</h1>
    <form action="{{ route('regiones_cuerpo.update', $region->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" class="form-control" value="{{ $region->tipo }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('regiones_cuerpo.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
